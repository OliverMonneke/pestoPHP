<?php

/**
 * Abstract class for singleton implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class ASingleton
 *
 * @package codersquad\pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class ASingleton
{

    /**
     * Array of instances
     *
     * @var array
     */
    private static $_instances = [];

    /**
     * No instance allowed
     *
     * @return \Codersquad\Pestophp\Classmanagement\ASingleton
     */
    private function __construct()
    {
    }

    /**
     * No cloning allowerd
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Get instance of class
     *
     * @return object
     */
    public static function getInstance()
    {
        $className = get_called_class();

        if (!array_key_exists($className, self::$_instances))
        {
            self::$_instances[$className] = new $className();
        }

        return self::$_instances[$className];
    }

}
