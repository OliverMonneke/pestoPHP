<?php

namespace Codersquad\Pestophp\Tests\Mathematic;

use Codersquad\Pestophp\Mathematic\Trigonometric;
use PHPUnit_Framework_TestCase;

/**
 * Class TrigonometricTest
 * @package Mathematic
 */
class TrigonometricTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testArcCosine()
    {
        $trigonometric = new Trigonometric(0.3);
        $this->assertEquals(1.2661036727795, $trigonometric->arcCosine()->getResult());
    }

    /**
     *
     */
    public function testArcSine()
    {
        $trigonometric = new Trigonometric(0.3);
        $this->assertEquals(0.3046926540154, $trigonometric->arcSine()->getResult());
    }

    /**
     *
     */
    public function testArcTangent()
    {
        $trigonometric = new Trigonometric(0.3);
        $this->assertEquals(0.29145679447787, $trigonometric->arcTangent()->getResult());
    }

    /**
     *
     */
    public function testCosine()
    {
        $trigonometric = new Trigonometric(0.3);
        $this->assertEquals(0.95533648912561, $trigonometric->cosine()->getResult());
    }

    /**
     *
     */
    public function testToRadian()
    {
        $trigonometric = new Trigonometric(0.3);
        $this->assertEquals(0.005235987755983, $trigonometric->toRadian()->getResult());
    }

    /**
     *
     */
    public function testHypotenuse()
    {
        $this->assertEquals(4.4721359549996, Trigonometric::hypotenuse(2, 4));
    }

    /**
     *
     */
    public function testLogarithm()
    {
        $trigonometric = new Trigonometric(90);
        $this->assertEquals(4.4998096703303, $trigonometric->logarithm()->getResult());
    }

    /**
     *
     */
    public function testToDegree()
    {
        $trigonometric = new Trigonometric(0.3);
        $this->assertEquals(17.188733853925, $trigonometric->toDegreee()->getResult());
    }

    /**
     *
     */
    public function testSine()
    {
        $trigonometric = new Trigonometric(0.3);
        $this->assertEquals(0.29552020666134, $trigonometric->sine()->getResult());
    }

    /**
     *
     */
    public function testTangent()
    {
        $trigonometric = new Trigonometric(0.3);
        $this->assertEquals(0.30933624960962, $trigonometric->tangent()->getResult());
    }
}
