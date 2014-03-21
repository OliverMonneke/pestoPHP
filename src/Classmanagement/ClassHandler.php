<?php

/**
 * Handling class management like controller loading
 */
namespace Codersquad\Pestophp\Classmanagement;
use Codersquad\Configuration\PathConfiguration;
use Codersquad\Filesystem\Directory;

/**
 * Class ClassHandler
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class ClassHandler
{
    /**
     * Load a specific controller
     *
     * @param string $controller The controller
     * @param string $action     The action
     *
     * @return string
     */
    public static function loadController($controller, $action)
    {
        $path = BASE_PATH.DIRECTORY_SEPARATOR.PathConfiguration::get('src');
        $fileName = '';

        $directory = new Directory($path, TRUE);
        $directory->setArray();

        foreach ($directory->getArray() as $_file)
        {
            if (is_file($_file) &&
                    preg_match('/^.*' . $controller . 'Controller.php$/', $_file))
            {
                $fileName = $_file;
                break;
            }
        }

        /** @noinspection PhpIncludeInspection */
        include_once $fileName;

        $exploded = explode('\\', $fileName);
        $className = [];
        $countExploded = count($exploded);

        for ($i = $countExploded - 5; $i < $countExploded; $i++)
        {
            $className[] = $exploded[$i];
        }

        $className = str_replace('.php', '', implode('\\', $className));

        if (!class_exists($className))
        {
            $className = 'Controller';
        }

        if (!method_exists($className, $action))
        {
            $action = 'defaultAction';
        }

        return ['controller' => $className, 'action' => $action];
    }
}
