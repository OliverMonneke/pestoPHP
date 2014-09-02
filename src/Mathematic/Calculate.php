<?php

/**
 * Calculation
 */
namespace Codersquad\Pestophp\Mathematic;

use Codersquad\Pestophp\Datatype\Number;
use Codersquad\Pestophp\Exception\DivisionByZeroException;

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
    protected $number = 0;

    /**
     * Default constructor
     *
     * @param number $number The number
     *
     * @return \Codersquad\Pestophp\Mathematic\Calculate
     */
    public function __construct($number)
    {
        $this->number = $number;
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
        $this->number += $number;

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
        $this->number -= $number;

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
        $this->number *= $number;

        return $this;
    }

    /**
     * Divide a value
     *
     * @param int|float $number The number
     *
     * @throws \Codersquad\Pestophp\Exception\DivisionByZeroException
     * @return Calculate
     */
    public function divide($number)
    {
        if (Number::isZero($number)) {
            throw new DivisionByZeroException;
        }

        $this->number = $this->number / $number;

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
        $this->number = round($this->number, $precision, $mode);

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
        for ($i = 1; $i <= $number; $i++) {
            $this->multiply($this->number);
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
        $this->number = pow($this->number, 1 / $number);

        return $this;
    }

    /**
     * Absolute expression
     *
     * @return Calculate
     */
    public function absolute()
    {
        $this->number = abs($this->number);

        return $this;
    }

    /**
     * Get the result
     *
     * @return int|number
     */
    public function getResult()
    {
        return $this->number;
    }

    /**
     * Round up
     *
     * @return Calculate
     */
    public function roundUp()
    {
        $this->number = ceil($this->number);

        return $this;
    }

    /**
     * Round down
     *
     * @return Calculate
     */
    public function roundDown()
    {
        $this->number = floor($this->number);

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
        $this->number = pow($this->number, $number);

        return $this;
    }
}
