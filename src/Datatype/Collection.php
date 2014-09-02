<?php

/**
 * Array management
 */
namespace Codersquad\Pestophp\Datatype;

/**
 * Class Collection
 *
 * @package Codersquad\Pestophp\Datatype
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Collection implements IDatatype
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
        return [$var];
    }

    /**
     * Check if it is an array
     *
     * @param array $array The array
     *
     * @return bool
     */
    public static function isValid($array)
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
        if (!self::isValid($array)) {
            return false;
        }

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
        if (!self::isValid($array)) {
            return false;
        }

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
        if (!self::isValid($array)) {
            return false;
        }

        return min($array);
    }

    /**
     * Fill an array with specific values
     *
     * @param int   $startIndex Index of first element
     * @param int   $count      Number of elements to fill
     * @param mixed $value      Value to fill
     *
     * @internal param array $array The array
     * @return array
     */
    public static function fillValues($startIndex, $count, $value)
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
    public static function merge($array1, $array2, $recursive = false)
    {
        if (!self::isValid($array1) ||
            !self::isValid($array2)) {
            return false;
        }

        if ($recursive) {
            return array_merge_recursive($array1, $array2);
        } else {
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
        if (!self::isValid($array)) {
            return false;
        }

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
        if (!self::isValid($array)) {
            return false;
        }

        $returnValue = false;
        $length = self::length($array);

        for($i = 0;$i < $length; $i++) {
            if ($value === $array[$i]) {
                $returnValue = true;
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
    public static function filter($array, $callback = null)
    {
        if (!self::isValid($array)) {
            return false;
        }

        return array_filter($array, $callback);
    }

    /**
     * Convert a string to an array
     *
     * @param string $string    The string
     * @param string $delimiter The delimiter
     *
     * @return array
     */
    public static function explode($string, $delimiter)
    {
        if (!String::isValid($string) ||
            String::isEmpty($string)) {
            return false;
        }

        return explode($delimiter, $string);
    }

    /**
     * Convert an array to a string
     *
     * @param array  $array The array
     * @param string $glue  The string to put together
     *
     * @return string
     */
    public static function implode($array, $glue = ',')
    {
        if (!self::isValid($array)) {
            return false;
        }

        return implode($glue, $array);
    }

    /**
     * Check if array is empty
     *
     * @param array $array The array
     *
     * @return bool
     */
    public static function isEmpty($array)
    {
        if (!self::isValid($array)) {
            return false;
        }

        return (self::length($array) === 0);
    }

    /**
     * Check if array is not empty
     *
     * @param array $array The array
     *
     * @return bool
     */
    public static function isNotEmpty($array)
    {
        if (!self::isValid($array)) {
            return false;
        }

        return (!self::isEmpty($array));
    }
}
