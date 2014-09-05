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

        $directory = new Directory($path, true);
        $directory->setArray();

        $className = self::loadSpecificController($controller, $directory);

        if (!class_exists($className)) {
            $className = 'Codersquad\Pestophp\Mvc\Controller';
        }

        if (!method_exists($className, $action)) {
            $action = 'defaultAction';
        }

        return ['controller' => $className, 'action' => $action];
    }

    /**
     * @param $controller
     * @param $directory
     * @return array|string
     */
    private static function loadSpecificController($controller, Directory $directory)
    {
        $className = '';

        if (String::isNotEmpty($controller)) {
            $fileName = self::findControllerFilename($controller, $directory);

            /** @noinspection PhpIncludeInspection */
            include_once $fileName;

            $className = self::generateClassName($fileName);
            $className = String::replace('.php', '', implode('\\', $className));

            return $className;
        }

        return $className;
    }

    /**
     * @param $controller
     * @param Directory $directory
     * @return mixed
     */
    private static function findControllerFilename($controller, Directory $directory)
    {
        $fileName = '';

        foreach ($directory->getArray() as $_file) {
            if (File::fileExists($_file) &&
                preg_match('/^.*' . $controller . 'Controller.php$/', $_file)
            ) {
                $fileName = $_file;
                break;
            }
        }
        return $fileName;
    }

    /**
     * @param $fileName
     * @return array
     */
    private static function generateClassName($fileName)
    {
        $exploded = explode('\\', $fileName);
        $className = [];
        $countExploded = count($exploded);

        for ($i = $countExploded - 5; $i < $countExploded; $i++) {
            $className[] = $exploded[$i];
        }

        return $className;
    }
}
