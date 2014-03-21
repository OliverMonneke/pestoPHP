<?php

/**
 * Calculation
 */
namespace Codersquad\Pestophp\Mathematic;
use Codersquad\Pestophp\Datatype\Number;
use Codersquad\Pestophp\Exception\DivisionByZero;

/**
 * Class Calculate
 *
 * @package Codersquad\Pestophp\Mathematic
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Calculate
{
    /**
     * The number to calculate with
     *
     * @var int
     */
    protected $_number = 0;

    /**
     * Default constructor
     *
     * @param number $number The number
     *
     * @return \Codersquad\Pestophp\Mathematic\Calculate
     */
    public function __construct($number)
    {
        $this->_number = $number;
    }

    /**
     * Add a value
     *
     * @param int|float $number The number
     *
     * @return Calculate
     */
    public function add($number)
    {
        $this->_number += $number;

        return $this;
    }

    /**
     * Subtract a value
     *
     * @param int|float $number The number
     *
     * @return Calculate
     */
    public function subtract($number)
    {
        $this->_number -= $number;

        return $this;
    }

    /**
     * Multiply a value
     *
     * @param int|float $number The number
     *
     * @return Calculate
     */
    public function multiply($number)
    {
        $this->_number *= $number;

        return $this;
    }

    /**
     * Divide a value
     *
     * @param int|float $number The number
     *
     * @throws DivisionByZero
     * @return Calculate
     */
    public function divide($number)
    {
        if (Number::isZero($number))
        {
            throw new DivisionByZero;
        }

        $this->_number = $this->_number / $number;

        return $this;
    }

    /**
     * Round the value
     *
     * @param int $precision The precision
     * @param int $mode      Mode to round
     *
     * @return Calculate
     */
    public function round($precision = 0, $mode = PHP_ROUND_HALF_UP)
    {
        $this->_number = round($this->_number, $precision, $mode);

        return $this;
    }

    /**
     * To the n expression
     *
     * @param number $number The number
     *
     * @return Calculate
     */
    public function toTheN($number)
    {
        for ($i = 1;$i <= $number; $i++)
        {
            $this->multiply($this->_number);
        }

        return $this;
    }

    /**
     * Root expression
     *
     * @param number $number The number
     *
     * @return Calculate
     */
    public function root($number)
    {
        $this->_number = pow($this->_number, 1 / $number);

        return $this;
    }

    /**
     * Absolute expression
     *
     * @return Calculate
     */
    public function absolute()
    {
        $this->_number = abs($this->_number);

        return $this;
    }

    /**
     * Get the result
     *
     * @return int|number
     */
    public function getResult()
    {
        return $this->_number;
    }

    /**
     * Round up
     *
     * @return Calculate
     */
    public function roundUp()
    {
        $this->_number = ceil($this->_number);

        return $this;
    }

    /**
     * Round down
     *
     * @return Calculate
     */
    public function roundDown()
    {
        $this->_number = floor($this->_number);

        return $this;
    }

    /**
     * Exponent expression
     *
     * @param number $number The number
     *
     * @return Calculate
     */
    public function exponent($number)
    {
        $this->_number = pow($this->_number, $number);

        return $this;
    }
}