<?php

/**
 * Abstract class for singleton implementation
 */
namespace Codersquad\Pestophp\Classmanagement;
use Codersquad\Pestophp\Datatype\Collection;

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

}
