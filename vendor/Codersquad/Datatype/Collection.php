<?php

/**
 * Array management
 */
namespace Codersquad\Datatype;

/**
 * Class Collection
 *
 * @package Codersquad\Datatype
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Collection
{
    /**
     * Convert to array
     *
     * @param mixed $var The expression to convert
     *
     * @return array
     */
    public static function toArray($var)
    {
        return array($var);
    }

    /**
     * Check if it is an array
     *
     * @param $array The array
     *
     * @return bool
     */
    public static function isArray($array)
    {
        return is_array($array);
    }

    /**
     * Get size of array
     *
     * @param array $array The array
     *
     * @return int
     */
    public static function length($array)
    {
        return count($array);
    }

    /**
     * Get the max value in an array
     *
     * @param array $array The array
     *
     * @return mixed
     */
    public static function maxValue($array)
    {
        return max($array);
    }

    /**
     * Get the min value in an array
     *
     * @param array $array The array
     *
     * @return mixed
     */
    public static function minValue($array)
    {
        return min($array);
    }
}