<?php

/**
 * Number handling
 */
namespace Codersquad\Pestophp\Datatype;

/**
 * Class Number
 *
 * @package Codersquad\Pestophp\Datatype
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Number implements IDatatype
{
    /**
     * Check if it is a number
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isValid($number)
    {
        return is_numeric($number);
    }

    /**
     * Check if number is float
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isFloat($number)
    {
        return is_float($number);
    }

    /**
     * Check if number is integer
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isInteger($number)
    {
        return is_int($number);
    }

    /**
     * Check if number is double
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isDouble($number)
    {
        return is_double($number);
    }

    /**
     * Check if number is greater than zero
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isPositive($number)
    {
        if (!self::isValid($number))
        {
            return false;
        }

        return ($number > 0);
    }

    /**
     * Check if number is less than zero
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isNegative($number)
    {
        if (!self::isValid($number))
        {
            return false;
        }

        return ($number < 0);
    }

    /**
     * Check if number is zero
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isZero($number)
    {
        if (!self::isValid($number))
        {
            return false;
        }

        return ($number === 0);
    }

    /**
     * Convert to integer
     *
     * @param mixed $var The expression
     *
     * @return int
     */
    public static function toInteger($var)
    {
        if (Object::isValid($var))
        {
            $var = 0;
        }

        return intval($var);
    }

    /**
     * Convert to float
     *
     * @param mixed $var The expression
     *
     * @return float
     */
    public static function toFloat($var)
    {
        if (Object::isValid($var))
        {
            $var = 0;
        }

        return floatval($var);
    }

    /**
     * Convert to double
     *
     * @param mixed $var The expression
     *
     * @return float
     */
    public static function toDouble($var)
    {
        if (Object::isValid($var))
        {
            $var = 0;
        }

        return doubleval($var);
    }

    /**
     * Format a number
     *
     * @param number $number            The number
     * @param int    $decimals          Decimals
     * @param string $decimalPoint      Decimal point
     * @param string $thousandSeparator Thousand separator
     *
     * @return string
     */
    public static function format($number, $decimals = 2, $decimalPoint = '.', $thousandSeparator = ',')
    {
        return number_format($number, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Check if number is finite
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isFinite($number)
    {
        if (!self::isDouble($number))
        {
            return false;
        }

        return is_finite($number);
    }

    /**
     * Check if number is inifinite
     *
     * @param number $number The number
     *
     * @return bool
     */
    public static function isInfinite($number)
    {
        if (!self::isDouble($number))
        {
            return false;
        }

        return is_infinite($number);
    }

    /**
     * Generate random number
     *
     * @param int $min Minimum value
     * @param int $max Maximum value
     *
     * @return int
     */
    public static function random($min, $max)
    {
        if (String::isEmpty($max) ||
            $max > getrandmax())
        {
            $max = getrandmax();
        }

        return rand($min, $max);
    }
}
