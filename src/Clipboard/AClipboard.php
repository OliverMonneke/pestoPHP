<?php

/**
 * Abstract class for clipboards
 */
namespace Codersquad\Pestophp\Clipboard;

use Codersquad\Pestophp\Classmanagement\TSingleton;

/**
 * Class AClipboard
 *
 * @package Codersquad\Pestophp\Clipboard
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class AClipboard
{
    use TSingleton;
    /**
     * Collection of all configuration types
     *
     * @var array
     */
    private static $registry = [];

    /**
     * Get instance and initialze array
     *
     * @return object
     */
    public static function getInstance()
    {
        if (!array_key_exists(get_called_class(), self::$registry)) {
            self::$registry[get_called_class()] = [];
        }

        return self::prepareInstance();
    }

    /**
     * Get configuration value by key
     *
     * @param string $key The key
     *
     * @return mixed
     */
    public static function get($key)
    {
        if (self::has($key)) {
            return self::$registry[get_called_class()][$key];
        } else {
            return null;
        }
    }

    /**
     * Check if property exists
     *
     * @param string $key The key
     *
     * @return bool
     */
    public static function has($key)
    {
        return array_key_exists($key, self::$registry[get_called_class()]);
    }

    /**
     * Get all configuration
     *
     * @return array
     */
    public static function getAll()
    {
        return self::$registry[get_called_class()];
    }

    /**
     * Set configuration property
     *
     * @param string $key The key
     * @param string $value The value
     *
     * @return void
     */
    public static function set($key, $value)
    {
        self::$registry[get_called_class()][$key] = $value;
    }

    /**
     * Remove property
     *
     * @param string $key The key
     *
     * @return void
     */
    public function remove($key)
    {
        unset(self::$registry[get_called_class()][$key]);
    }

    /**
     * Remove all properties
     *
     * @return void
     */
    public function removeAll()
    {
        self::$registry[get_called_class()] = [];
    }
}
