<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 03.01.14
 * Time: 17:57
 */

namespace Codersquad\Mathematic;


class Trigonometric extends  Calculate
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
        $this->_number = acos($this->_number);

        return $this;
    }

    /**
     * Arc sine expression
     *
     * @return Trigonometric
     */
    public function arcSine()
    {
        $this->_number = asin($this->_number);

        return $this;
    }

    /**
     * Arc tangent expression
     *
     * @return Trigonometric
     */
    public function arcTangent()
    {
        $this->_number = atan($this->_number);

        return $this;
    }

    /**
     * Cosine expression
     *
     * @return Trigonometric
     */
    public function cosine()
    {
        $this->_number = cos($this->_number);

        return $this;
    }

    /**
     * Convert to radian
     *
     * @return Trigonometric
     */
    public function toRadian()
    {
        $this->_number = deg2rad($this->_number);

        return $this;
    }

    /**
     * Calculate hypotenuse
     *
     * @param number $x Length of first line
     * @param number $y Length of second line
     *
     * @return float
     */
    public static function hypotenuse($x, $y)
    {
        return hypot($x, $y);
    }

    /**
     * Logarithm expression
     *
     * @return Trigonometric
     */
    public function logarithm()
    {
        $this->_number = log($this->_number);

        return $this;
    }

    /**
     * Convert to degree
     *
     * @return Trigonometric
     */
    public function toDegreee()
    {
        $this->_number = rad2deg($this->_number);

        return $this;
    }

    /**
     * Sine expression
     *
     * @return Trigonometric
     */
    public function sine()
    {
        $this->_number = sin($this->_number);

        return $this;
    }

    /**
     * Tangent expression
     *
     * @return Trigonometric
     */
    public function tangent()
    {
        $this->_number = tan($this->_number);

        return $this;
    }
}