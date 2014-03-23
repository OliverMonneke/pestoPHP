<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 13:47
 */

namespace Datatype;


use Codersquad\Pestophp\Datatype\Number;
use stdClass;

/**
 * Class NumberTest
 * @package Datatype
 */
class NumberTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testIsValid()
    {
        $this->assertInternalType('bool', Number::isValid(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isValid(''));
        $this->assertInternalType('bool', Number::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isValid(new stdClass()));
        $this->assertFalse(Number::isValid(['a', 'b', 'c']));
        $this->assertFalse(Number::isValid('abc'));
        $this->assertFalse(Number::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isValid(new stdClass()));
        $this->assertTrue(Number::isValid(3212.5));
    }

    /**
     *
     */
    public function testIsFloat()
    {
        $this->assertFalse(Number::isFloat(3212));
        $this->assertTrue(Number::isFloat(2.5));
    }

    /**
     *
     */
    public function testIsInteger()
    {
        $this->assertFalse(Number::isInteger(2.5));
        $this->assertTrue(Number::isInteger(3212));
    }

    /**
     *
     */
    public function testIsDouble()
    {
        $this->assertFalse(Number::isDouble(3212));
        $this->assertTrue(Number::isDouble(42.11));
    }

    /**
     *
     */
    public function testIsPositive()
    {
        $this->assertTrue(Number::isPositive(2.5));
        $this->assertFalse(Number::isPositive(-3212));
        $this->assertTrue(Number::isPositive(12));
    }

    /**
     *
     */
    public function testIsNegative()
    {
        $this->assertFalse(Number::isNegative(2.5));
        $this->assertTrue(Number::isNegative(-3212));
        $this->assertFalse(Number::isNegative(12));
    }

    /**
     *
     */
    public function testIsZero()
    {
        $this->assertFalse(Number::isZero(2.5));
        $this->assertFalse(Number::isZero(-3212));
        $this->assertFalse(Number::isZero(12));
        $this->assertTrue(Number::isZero(0));
    }

    /**
     *
     */
    public function testToInteger()
    {
        $this->markTestIncomplete('test Number::toInteger not yet implemented');
    }

    /**
     *
     */
    public function testToFloat()
    {
        $this->markTestIncomplete('test Number::toFloat not yet implemented');
    }

    /**
     *
     */
    public function testToDouble()
    {
        $this->markTestIncomplete('test Number::toDouble not yet implemented');
    }

    /**
     *
     */
    public function testFormat()
    {
        $this->markTestIncomplete('test for Number:format($number, $decimals, $decimalPoint, $thousandSeparator) not implemented yet');
    }

    /**
     *
     */
    public function testIsFinite()
    {
        $this->assertTrue(Number::isFinite(3212.5));
    }

    /**
     *
     */
    public function testisInfinite()
    {
        $this->assertFalse(Number::isInfinite(3212.5));
    }

    /**
     *
     */
    public function testRandomWithoutMax()
    {
        $this->markTestIncomplete('test for Number:random($min, $max) not implemented yet');
    }

    /**
     *
     */
    public function testRandomWithMax()
    {
        $this->markTestIncomplete('test for Number:random($min, $max) not implemented yet');
    }
}
