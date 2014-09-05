<?php

namespace Codersquad\Pestophp\Classmanagement;

use Codersquad\Pestophp\Datatype\Collection;

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
     *
     * @return \Codersquad\Pestophp\Classmanagement\TSingleton
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
        return self::_getInstance();
    }

    /**
     * @return mixed
     */
    protected static function _getInstance()
    {
        $className = get_called_class();

        self::_createInstance($className);

        return self::$instances[$className];
    }

    /**
     * @param $className
     */
    private static function _createInstance($className)
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
