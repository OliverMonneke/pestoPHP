<?php

/**
 * Class for string manipulation
 */
namespace Codersquad\Pestophp\Datatype;

/**
 * Class String
 *
 * @package Codersquad\Pestophp\Datatype
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class String implements IDatatype
{
    /**
     * Check if it is a string
     *
     * @param string $string The string
     *
     * @return bool
     */
    public static function isValid($string)
    {
        return is_string($string);
    }

    /**
     * Convert string to lowercase
     *
     * @param string $string The string
     *
     * @return string
     */
    public static function lower($string)
    {
        if (!self::isValid($string))
        {
            return false;
        }

        return mb_strtolower($string);
    }

    /**
     * Convert string to uppercase
     *
     * @param string $string The string
     *
     * @return string
     */
    public static function upper($string)
    {
        if (!self::isValid($string))
        {
            return false;
        }

        return mb_strtoupper($string);
    }

    /**
     * Get a part of a string
     *
     * @param string $string The string
     * @param int    $start  Starting point
     * @param int    $length Length
     *
     * @return string
     */
    public static function substring($string, $start = 0, $length = NULL)
    {
        if (!self::isValid($string))
        {
            return false;
        }

        return mb_substr($string, $start, $length);
    }

    /**
     * Length of a string
     *
     * @param string $string The string
     *
     * @return int
     */
    public static function length($string)
    {
        if (!self::isValid($string))
        {
            return false;
        }

        return mb_strlen($string);
    }

    /**
     * Check if string starts with another string
     *
     * @param string $needle        String to look for
     * @param string $haystack      String to check
     * @param bool   $caseSensitive Case sensitive check
     *
     * @return bool
     */
    public static function startsWith($needle, $haystack, $caseSensitive = TRUE)
    {
        if (!self::isValid($needle))
        {
            return false;
        }

        if (!$caseSensitive)
        {
            $needle = self::lower($needle);
            $haystack = self::lower($haystack);
        }

        return (self::substring($haystack, 0, self::length($needle)) === $needle);
    }

    /**
     * Check if string ends with another string
     *
     * @param string $needle        String to look for
     * @param string $haystack      String to check
     * @param bool   $caseSensitive Case sensitive check
     *
     * @return bool
     */
    public static function endsWith($needle, $haystack, $caseSensitive = TRUE)
    {
        if (!$caseSensitive)
        {
            $needle = self::lower($needle);
            $haystack = self::lower($haystack);
        }

        return (self::substring($haystack, -(self::length($needle))) === $needle);
    }

    /**
     * Check if string contains another string
     *
     * @param string $needle        String to look for
     * @param string $haystack      String to check
     * @param bool   $caseSensitive Case sensitive check
     *
     * @return bool
     */
    public static function contains($needle, $haystack, $caseSensitive = TRUE)
    {
        if (!self::isValid($haystack))
        {
            return false;
        }

        if (!$caseSensitive)
        {
            $needle = self::lower($needle);
            $haystack = self::lower($haystack);
        }

        return (mb_strpos($haystack, $needle) !== FALSE);
    }

    /**
     * Replace a string with another string
     *
     * @param string $search        The string to look for
     * @param string $replace       The replacement string
     * @param string $string        The string to check
     * @param bool   $caseSensitive Case sensitive replacement
     *
     * @return string
     */
    public static function replace($search, $replace, $string, $caseSensitive = TRUE)
    {
        if (!self::isValid($replace))
        {
            return false;
        }

        if (!$caseSensitive)
        {
            return str_ireplace($search, $replace, $string);
        }
        else
        {
            return str_replace($search, $replace, $string);
        }
    }

    /**
     * Check if string is empty
     *
     * @param string $string The string
     *
     * @return bool
     */
    public static function isEmpty($string)
    {
        if (!self::isValid($string) &&
            null !== $string)
        {
            return false;
        }

        return ($string === NULL || $string === '');
    }

    /**
     * Check if string is not empty
     *
     * @param string $string The string
     *
     * @return bool
     */
    public static function isNotEmpty($string)
    {
        if (!self::isValid($string) &&
            null !== $string)
        {
            return false;
        }

        return (!self::isEmpty($string));
    }

    /**
     * @param $string
     * @return string
     */
    public static function lowerFirst($string)
    {
        return self::lower(self::substring($string, 0, 1)).self::substring($string, 1);

    }

    /**
     * @param $string
     * @return string
     */
    public static function upperFirst($string)
    {
        return self::upper(self::substring($string, 0, 1)).self::substring($string, 1);
    }
}
