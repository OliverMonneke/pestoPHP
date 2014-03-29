<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 13:47
 */

namespace Codersquad\Pestophp\Tests\Datatype;


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
        $this->assertEquals(3, Number::toInteger('3'));
    }

    /**
     *
     */
    public function testToFloat()
    {
        $this->assertEquals(3212.0, Number::toFloat(3212));
    }

    /**
     *
     */
    public function testToDouble()
    {
        $this->assertEquals(3212.0, Number::toDouble(3212));
    }

    /**
     *
     */
    public function testFormat()
    {
        $this->assertEquals('3.212,000', Number::format(3212, 3, ',', '.'));
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
        $randomNumber = Number::random(1, 3212);
        $this->assertGreaterThanOrEqual(1, $randomNumber);
        $this->assertLessThanOrEqual(3212, $randomNumber);
    }

    /**
     *
     */
    public function testRandomWithMax()
    {
        $randomNumber = Number::random(1);
        $this->assertGreaterThanOrEqual(1, $randomNumber);
    }

    /**
     *
     */
    public function testIsPositiveWithWrongDatatype()
    {
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isPositive('abc'));
    }

    /**
     *
     */
    public function testIsNegativeWithWrongDatatype()
    {
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isNegative('abc'));
    }

    /**
     *
     */
    public function testIsZeroWithWrongDatatype()
    {
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Number::isZero('abc'));
    }

    /**
     *
     */
    public function testToIntegerWithObjectDatatype()
    {
        $this->assertEquals(0, Number::toInteger(new stdClass()));
    }

    /**
     *
     */
    public function testToFloatWithObjectDatatype()
    {
        $this->assertEquals(0.0, Number::toFloat(new stdClass()));
    }

    /**
     *
     */
    public function testToDoubleWithObjectDatatype()
    {
        $this->assertEquals(0.0, Number::toDouble(new stdClass()));
    }

    /**
     *
     */
    public function testIsFiniteWithWrongDatatype()
    {
        $this->assertFalse(Number::isFinite(0));
    }

    /**
     *
     */
    public function testIsInfiniteWithWrongDatatype()
    {
        $this->assertFalse(Number::isInfinite(0));
    }
}
