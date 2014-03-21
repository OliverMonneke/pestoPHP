<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 13:47
 */

namespace Datatype;


use Codersquad\Pestophp\Datatype\Collection;
use Codersquad\Pestophp\Datatype\Number;

/**
 * Class NumberTest
 * @package Datatype
 */
class NumberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var float
     */
    private $_number = 3212.5;
    /**
     * @var float
     */
    private $_float = 2.5;
    /**
     * @var int
     */
    private $_integer = 3212;
    /**
     * @var float
     */
    private $_double = 42.11;
    /**
     * @var int
     */
    private $_negative = -12;
    /**
     * @var int
     */
    private $_positive = 12;
    /**
     * @var string
     */
    private $_string = '123';

    /**
     *
     */
    public function testIsValid()
    {
        $this->assertTrue(Number::isValid($this->_number));
    }

    /**
     *
     */
    public function testIsFloat()
    {
        $this->assertTrue(Number::isFloat($this->_float));
    }

    /**
     *
     */
    public function testIsInteger()
    {
        $this->assertTrue(Number::isInteger($this->_integer));
    }

    /**
     *
     */
    public function testIsDouble()
    {
        $this->assertTrue(Number::isDouble($this->_double));
    }

    /**
     *
     */
    public function testIsPositive()
    {
        $this->assertTrue(Number::isPositive($this->_positive));
    }

    /**
     *
     */
    public function testIsNegative()
    {
        $this->assertTrue(Number::isNegative($this->_negative));
    }

    /**
     *
     */
    public function testIsZero()
    {
        $this->assertTrue(Number::isZero(0));
    }

    /**
     *
     */
    public function testToInteger()
    {
        $this->assertTrue(Number::isInteger(Number::toInteger($this->_string)));
    }

    /**
     *
     */
    public function testToFloat()
    {
        $this->assertTrue(Number::isFloat(Number::toFloat($this->_string)));
    }

    /**
     *
     */
    public function testToDouble()
    {
        $this->assertTrue(Number::isDouble(Number::toDouble($this->_string)));
    }

    /**
     *
     */
    public function testFormat()
    {
        // @todo implement test for Number::format
    }

    /**
     *
     */
    public function testIsFinite()
    {
        $this->assertTrue(Number::isFinite($this->_float));
    }

    /**
     *
     */
    public function testisInfinite()
    {
        $this->assertFalse(Number::isInfinite($this->_float));
    }

    /**
     *
     */
    public function testRandomWithoutMax()
    {
        // @todo implement Number::random without $max
    }

    /**
     *
     */
    public function testRandomWithMax()
    {
        // @todo implement Number::random with $max
    }
}
