<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 29.03.2014
 * Time: 10:44
 */

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
    private static $_instances = [];

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
        $className = get_called_class();

        self::_createInstance($className);

        return self::$_instances[$className];
    }

    /**
     * @param $className
     */
    private static function _createInstance($className)
    {
        if (!Collection::existsKey(self::$_instances, $className)) {
            self::$_instances[$className] = new $className();
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