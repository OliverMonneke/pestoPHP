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
        $this->assertInternalType('bool', Number::isFloat(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isFloat(''));
        $this->assertInternalType('bool', Number::isFloat(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isFloat(new stdClass()));
        $this->assertFalse(Number::isFloat(['a', 'b', 'c']));
        $this->assertFalse(Number::isFloat('abc'));
        $this->assertFalse(Number::isFloat(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isFloat(new stdClass()));
        $this->assertFalse(Number::isFloat(3212));
        $this->assertTrue(Number::isFloat(2.5));
    }

    /**
     *
     */
    public function testIsInteger()
    {
        $this->assertInternalType('bool', Number::isInteger(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isInteger(''));
        $this->assertInternalType('bool', Number::isInteger(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isInteger(new stdClass()));
        $this->assertFalse(Number::isInteger(['a', 'b', 'c']));
        $this->assertFalse(Number::isInteger('abc'));
        $this->assertFalse(Number::isInteger(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isInteger(new stdClass()));
        $this->assertFalse(Number::isInteger(2.5));
        $this->assertTrue(Number::isInteger(3212));
    }

    /**
     *
     */
    public function testIsDouble()
    {
        $this->assertInternalType('bool', Number::isDouble(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isDouble(''));
        $this->assertInternalType('bool', Number::isDouble(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isDouble(new stdClass()));
        $this->assertFalse(Number::isDouble(['a', 'b', 'c']));
        $this->assertFalse(Number::isDouble('abc'));
        $this->assertFalse(Number::isDouble(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isDouble(new stdClass()));
        $this->assertFalse(Number::isDouble(3212));
        $this->assertTrue(Number::isDouble(42.11));
    }

    /**
     *
     */
    public function testIsPositive()
    {
        $this->assertInternalType('bool', Number::isPositive(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isPositive(''));
        $this->assertInternalType('bool', Number::isPositive(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isPositive(new stdClass()));
        $this->assertFalse(Number::isPositive(['a', 'b', 'c']));
        $this->assertFalse(Number::isPositive('abc'));
        $this->assertFalse(Number::isPositive(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isPositive(new stdClass()));
        $this->assertTrue(Number::isPositive(2.5));
        $this->assertFalse(Number::isPositive(-3212));
        $this->assertTrue(Number::isPositive(12));
    }

    /**
     *
     */
    public function testIsNegative()
    {
        $this->assertInternalType('bool', Number::isNegative(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isNegative(''));
        $this->assertInternalType('bool', Number::isNegative(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isNegative(new stdClass()));
        $this->assertFalse(Number::isNegative(['a', 'b', 'c']));
        $this->assertFalse(Number::isNegative('abc'));
        $this->assertFalse(Number::isNegative(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isNegative(new stdClass()));
        $this->assertFalse(Number::isNegative(2.5));
        $this->assertTrue(Number::isNegative(-3212));
        $this->assertFalse(Number::isNegative(12));
    }

    /**
     *
     */
    public function testIsZero()
    {
        $this->assertInternalType('bool', Number::isZero(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isZero(''));
        $this->assertInternalType('bool', Number::isZero(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isZero(new stdClass()));
        $this->assertFalse(Number::isZero(['a', 'b', 'c']));
        $this->assertFalse(Number::isZero('abc'));
        $this->assertFalse(Number::isZero(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isZero(new stdClass()));
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
        $this->assertInternalType('integer', Number::toInteger(['a', 'b', 'c']));
        $this->assertInternalType('integer', Number::toInteger(''));
        $this->assertInternalType('integer', Number::toInteger(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('integer', Number::toInteger(new stdClass()));
        $this->assertEquals(1, Number::toInteger(['a', 'b', 'c']));
        $this->assertEquals(0, Number::toInteger('abc'));
        $this->assertEquals(0, Number::toInteger(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertEquals(0, Number::toInteger(new stdClass()));
    }

    /**
     *
     */
    public function testToFloat()
    {
        $this->assertInternalType('float', Number::toFloat(['a', 'b', 'c']));
        $this->assertInternalType('float', Number::toFloat(''));
        $this->assertInternalType('float', Number::toFloat(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('float', Number::toFloat(new stdClass()));
        $this->assertEquals(1.0, Number::toFloat(['a', 'b', 'c']));
        $this->assertEquals(0.0, Number::toFloat('abc'));
        $this->assertEquals(0.0, Number::toFloat(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertEquals(0.0, Number::toFloat(new stdClass()));
    }

    /**
     *
     */
    public function testToDouble()
    {
        $this->assertEquals(1.0, Number::toDouble(['a', 'b', 'c']));
        $this->assertEquals(0.0, Number::toDouble('abc'));
        $this->assertEquals(0.0, Number::toDouble(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertEquals(0.0, Number::toDouble(new stdClass()));
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
        $this->assertInternalType('bool', Number::isFinite(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isFinite(''));
        $this->assertInternalType('bool', Number::isFinite(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isFinite(new stdClass()));
        $this->assertFalse(Number::isFinite(['a', 'b', 'c']));
        $this->assertFalse(Number::isFinite('abc'));
        $this->assertFalse(Number::isFinite(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isFinite(new stdClass()));
        $this->assertTrue(Number::isFinite(3212.5));
    }

    /**
     *
     */
    public function testisInfinite()
    {
        $this->assertInternalType('bool', Number::isInfinite(['a', 'b', 'c']));
        $this->assertInternalType('bool', Number::isInfinite(''));
        $this->assertInternalType('bool', Number::isInfinite(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Number::isInfinite(new stdClass()));
        $this->assertFalse(Number::isInfinite(['a', 'b', 'c']));
        $this->assertFalse(Number::isInfinite('abc'));
        $this->assertFalse(Number::isInfinite(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isInfinite(new stdClass()));
        $this->assertFalse(Number::isInfinite(3212.5));
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
