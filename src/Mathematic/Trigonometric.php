<?php

/**
 * Trigonometry handling
 */
namespace Codersquad\Pestophp\Mathematic;

/**
 * Class Trigonometric
 *
 * @package Codersquad\Pestophp\Mathematic
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Trigonometric extends Calculate
{
    /**
     * Constant for PI
     */
    const PI = M_PI;

    /**
     * Arc cosine expression
     *
     * @return Trigonometric
     */
    public function arcCosine()
    {
        $this->number = acos($this->number);

        return $this;
    }

    /**
     * Arc sine expression
     *
     * @return Trigonometric
     */
    public function arcSine()
    {
        $this->number = asin($this->number);

        return $this;
    }

    /**
     * Arc tangent expression
     *
     * @return Trigonometric
     */
    public function arcTangent()
    {
        $this->number = atan($this->number);

        return $this;
    }

    /**
     * Cosine expression
     *
     * @return Trigonometric
     */
    public function cosine()
    {
        $this->number = cos($this->number);

        return $this;
    }

    /**
     * Convert to radian
     *
     * @return Trigonometric
     */
    public function toRadian()
    {
        $this->number = deg2rad($this->number);

        return $this;
    }

    /**
     * Calculate hypotenuse
     *
     * @param number $xValue Length of first line
     * @param number $yValue Length of second line
     *
     * @return float
     */
    public static function hypotenuse($xValue, $yValue)
    {
        return hypot($xValue, $yValue);
    }

    /**
     * Logarithm expression
     *
     * @return Trigonometric
     */
    public function logarithm()
    {
        $this->number = log($this->number);

        return $this;
    }

    /**
     * Convert to degree
     *
     * @return Trigonometric
     */
    public function toDegreee()
    {
        $this->number = rad2deg($this->number);

        return $this;
    }

    /**
     * Sine expression
     *
     * @return Trigonometric
     */
    public function sine()
    {
        $this->number = sin($this->number);

        return $this;
    }

    /**
     * Tangent expression
     *
     * @return Trigonometric
     */
    public function tangent()
    {
        $this->number = tan($this->number);

        return $this;
    }
}
