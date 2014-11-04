<?php

namespace Codersquad\Pestophp\Classmanagement;

use Codersquad\Pennephp\Datatype\Collection;

/**
 * Class TSingleton
 * @package Codersquad\Pestophp\Classmanagement
 */
trait TSingleton
{
    /**
     * Array of instances
     *
     * @var array
     */
    private static $instances = [];

    /**
     * No instance allowed
     */
    private function __construct()
    {
    }

    /**
     * Get instance of class
     *
     * @return object
     */
    public static function getInstance()
    {
        return self::prepareInstance();
    }

    /**
     * @return mixed
     */
    protected static function prepareInstance()
    {
        $className = get_called_class();

        self::createInstance($className);

        return self::$instances[$className];
    }

    /**
     * @param $className
     */
    private static function createInstance($className)
    {
        if (!Collection::existsKey(self::$instances, $className)) {
            self::$instances[$className] = new $className();
        }
    }

    /**
     * No cloning allowerd
     *
     * @return void
     */
    private function __clone()
    {
    }
}
