<?php

namespace Codersquad\Pestophp\Tests\Mathematic;

use Codersquad\Pestophp\Mathematic\Calculate;

/**
 * Class CalculateTest
 * @package Mathematic
 */
class CalculateTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetResult()
    {
        $calculate = new Calculate(1);
        $this->assertEquals(1, $calculate->getResult());
    }

    /**
     *
     */
    public function testAdd()
    {
        $calculate = new Calculate(1);
        $calculate->add(1);
        $this->assertEquals(2, $calculate->getResult());
    }

    /**
     *
     */
    public function testSubtract()
    {
        $calculate = new Calculate(1);
        $calculate->subtract(1);
        $this->assertEquals(0, $calculate->getResult());
    }

    /**
     *
     */
    public function testMultiply()
    {
        $calculate = new Calculate(2);
        $calculate->multiply(2);
        $this->assertEquals(4, $calculate->getResult());
    }

    /**
     *
     */
    public function testDivide()
    {
        $calculate = new Calculate(2);
        $calculate->divide(2);
        $this->assertEquals(1, $calculate->getResult());
    }


    /**
     *
     */
    public function testDivideByZero()
    {
        $calculator = new Calculate(2);
        $this->setExpectedException('Codersquad\Pestophp\Exception\DivisionByZeroException');
        $calculator->divide(0);
    }

    /**
     *
     */
    public function testRound()
    {
        $calculate = new Calculate(2.2);
        $this->assertEquals(2, $calculate->round()->getResult());
    }

    /**
     *
     */
    public function testRoundUp()
    {
        $calculate = new Calculate(2.2);
        $this->assertEquals(3, $calculate->roundUp()->getResult());
    }

    /**
     *
     */
    public function testRoundDown()
    {
        $calculate = new Calculate(2.8);
        $this->assertEquals(2, $calculate->roundDown()->getResult());
    }

    /**
     *
     */
    public function testToTheNth()
    {
        $calculate = new Calculate(2);
        $this->assertEquals(256, $calculate->toTheN(3)->getResult());
    }

    /**
     *
     */
    public function testRoot()
    {
        $calculate = new Calculate(16);
        $this->assertEquals(4, $calculate->root(2)->getResult());
    }

    /**
     *
     */
    public function testAbsolute()
    {
        $calculate = new Calculate(-2);
        $this->assertEquals(2, $calculate->absolute()->getResult());
    }

    /**
     *
     */
    public function testExponent()
    {
        $calculate = new Calculate(2);
        $this->assertEquals(8, $calculate->exponent(3)->getResult());
    }
}
