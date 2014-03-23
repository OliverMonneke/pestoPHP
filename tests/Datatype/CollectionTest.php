<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 09:15
 */

namespace Datatype;

use Codersquad\Pestophp\Datatype\Collection;
use stdClass;

/**
 * Class CollectionTest
 * @package Datatype
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testToArray()
    {
        $this->assertInternalType('array', Collection::toArray(['a', 'b', 'c']));
        $this->assertInternalType('array', Collection::toArray('abc'));
        $this->assertEquals([['a', 'b', 'c']], Collection::toArray(['a', 'b', 'c']));
        $this->assertEquals([NULL], Collection::toArray(NULL));
        $this->assertEquals(['abc'], Collection::toArray('abc'));
    }

    /**
     *
     */
    public function testIsValid()
    {
        $this->assertInternalType('bool', Collection::isValid(['a', 'b', 'c']));
        $this->assertInternalType('bool', Collection::isValid(''));
        $this->assertInternalType('bool', Collection::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::isValid(new stdClass()));
        $this->assertTrue(Collection::isValid(['a', 'b', 'c']));
        $this->assertFalse(Collection::isValid('abc'));
        $this->assertFalse(Collection::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::isValid(new stdClass()));
    }

    /**
     *
     */
    public function testLength()
    {
        $this->assertNotEquals(2, Collection::length(['a', 'b', 'c']));
        $this->assertEquals(3, Collection::length(['a', 'b', 'c']));
        $this->assertNotEquals(4, Collection::length(['a', 'b', 'c']));
    }

    /**
     *
     */
    public function testMax()
    {
        $this->assertEquals('c', Collection::maxValue(['a', 'b', 'c']));
    }

    /**
     *
     */
    public function testMin()
    {
        $this->assertEquals(min(['a', 'b', 'c']), Collection::minValue(['a', 'b', 'c']));
    }

    /**
     *
     */
    public function testFillValues()
    {
        $this->assertEquals([1 => 'abc', 2 => 'abc', 3 => 'abc'], Collection::fillValues(1, 3, 'abc'));
    }

    /**
     *
     */
    public function testFillKeys()
    {
        $this->assertEquals([0 => 'abc', 1 => 'abc', 2 => 'abc'], Collection::fillKeys([0, 1, 2], 'abc'));
    }

    /**
     *
     */
    public function testMergeNotRecursive()
    {
        $this->assertEquals(['a', 'b', 'c', 'x', 'y', 'z'], Collection::merge(['a', 'b', 'c'], ['x', 'y', 'z'], false));
    }

    /**
     *
     */
    public function testMergeRecursive()
    {
        $this->assertEquals(['a', 'b', 'c', 'x', 'y', 'z'], Collection::merge(['a', 'b', 'c'], ['x', 'y', 'z'], true));
    }

    /**
     *
     */
    public function testExistsKey()
    {
        $this->assertTrue(Collection::existsKey(['a', 'b', 'c'], 0));
        $this->assertTrue(Collection::existsKey(['a', 'b', 'c'], 1));
        $this->assertTrue(Collection::existsKey(['a', 'b', 'c'], 2));
        $this->assertFalse(Collection::existsKey(['a', 'b', 'c'], 3));
        $this->assertFalse(Collection::existsKey(['a', 'b', 'c'], 'a'));
    }

    /**
     *
     */
    public function testExistsValue()
    {
        $this->assertTrue(Collection::existsValue(['a', 'b', 'c'], 'a'));
        $this->assertTrue(Collection::existsValue(['a', 'b', 'c'], 'b'));
        $this->assertTrue(Collection::existsValue(['a', 'b', 'c'], 'c'));
        $this->assertFalse(Collection::existsValue(['a', 'b', 'c'], 'd'));
        $this->assertFalse(Collection::existsValue(['a', 'b', 'c'], 0));
    }

    /**
     *
     */
    public function testFilter()
    {
        $this->markTestIncomplete('test for Collection::filter($array, $callback) not implemented yet');
    }

    /**
     *
     */
    public function testExplode()
    {
        $this->assertEquals(['a', 'c'], Collection::explode('abc', 'b'));
    }

    /**
     *
     */
    public function testImplode()
    {
        $this->assertEquals('a,b,c', Collection::implode(['a', 'b', 'c'], ','));
    }

    /**
     *
     */
    public function testIsEmpty()
    {
        $this->assertTrue(Collection::isEmpty([]));
        $this->assertFalse(Collection::isEmpty(['a']));
    }

    /**
     *
     */
    public function testIsNotEmty()
    {
        $this->assertTrue(Collection::isNotEmpty(['a', 'b', 'c']));
        $this->assertFalse(Collection::isNotEmpty([]));
    }
}
