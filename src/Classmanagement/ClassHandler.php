<?php

/**
 * Handling class management like controller loading
 */
namespace Codersquad\Pestophp\Classmanagement;
use Codersquad\Pestophp\Configuration\PathConfiguration;
use Codersquad\Pestophp\Datatype\String;
use Codersquad\Pestophp\Filesystem\Directory;
use Codersquad\Pestophp\Filesystem\File;

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
        $className = '';

        $directory = new Directory($path, TRUE);
        $directory->setArray();

        if (String::isNotEmpty($controller))
        {
            foreach ($directory->getArray() as $_file)
            {
                if (File::fileExists($_file) &&
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
        }

        if (!class_exists($className))
        {
            $className = 'Codersquad\Pestophp\Mvc\Controller';
        }

        if (!method_exists($className, $action))
        {
            $action = 'defaultAction';
        }

        return ['controller' => $className, 'action' => $action];
    }
}
