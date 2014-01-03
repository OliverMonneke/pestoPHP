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

    /**
     * Fill an array with specific values
     *
     * @param array $array      The array
     * @param int   $startIndex Index of first element
     * @param int   $count      Number of elements to fill
     * @param mixed $value      Value to fill
     *
     * @return array
     */
    public static function fillValues($array, $startIndex, $count, $value)
    {
        return array_fill($startIndex, $count, $value);
    }

    /**
     * Fill an array with specific keys
     *
     * @param array $keys  The keys
     * @param mixed $value The value
     *
     * @return array
     */
    public static function fillKeys($keys, $value)
    {
        return array_fill_keys($keys, $value);
    }

    /**
     * Merge 2 arrays
     *
     * @param array $array1    First array
     * @param array $array2    Second array
     * @param bool  $recursive Recursive
     *
     * @return array
     */
    public static function merge($array1, $array2, $recursive = FALSE)
    {
        if ($recursive)
        {
            return array_merge_recursive($array1, $array2);
        }
        else
        {
            return array_merge($array1, $array2);
        }
    }

    /**
     * Check if key exists in an array
     *
     * @param array $array The array
     * @param mixed $key   The key to look for
     *
     * @return bool
     */
    public static function existsKey($array, $key)
    {
        return array_key_exists($key, $array);
    }

    /**
     * Check if a value exists in an array
     *
     * @param array $array The array
     * @param mixed $value The value to look for
     *
     * @return bool
     */
    public static function existsValue($array, $value)
    {
        $returnValue = FALSE;
        $length = self::length($array);

        for($i = 0;$i < $length; $i++)
        {
            if ($value == $array[$i])
            {
                $returnValue = TRUE;
                break;
            }
        }

        return $returnValue;
    }

    /**
     * Filter an array using a callback function
     *
     * @param array $array    The array
     * @param mixed $callback Callback function
     *
     * @return array
     */
    public static function filter($array, $callback = NULL)
    {
        return array_filter($array, $callback);
    }
}
