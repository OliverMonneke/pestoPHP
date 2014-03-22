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
        $this->assertInternalType('array', Collection::toArray(''));
        $this->assertInternalType('array', Collection::toArray(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('array', Collection::toArray(new stdClass()));
        $this->assertEquals([['a', 'b', 'c']], Collection::toArray(['a', 'b', 'c']));
        $this->assertEquals([NULL], Collection::toArray(NULL));
        $this->assertInternalType('array', Collection::toArray('abc'));
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
        $this->assertInternalType('bool', Collection::length(''));
        $this->assertInternalType('bool', Collection::length(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::length(new stdClass()));
        $this->assertFalse(Collection::length(''));
        $this->assertFalse(Collection::length(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::length(new stdClass()));
        $this->assertEquals(3, Collection::length(['a', 'b', 'c']));
        $this->assertNotEquals(2, Collection::length(['a', 'b', 'c']));
        $this->assertNotEquals(4, Collection::length(['a', 'b', 'c']));
    }

    /**
     *
     */
    public function testMax()
    {
        $this->assertInternalType('bool', Collection::maxValue(''));
        $this->assertInternalType('bool', Collection::maxValue(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::maxValue(new stdClass()));
        $this->assertFalse(Collection::maxValue(''));
        $this->assertFalse(Collection::maxValue(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::maxValue(new stdClass()));
        $this->assertEquals('c', Collection::maxValue(['a', 'b', 'c']));
    }

    /**
     *
     */
    public function testMin()
    {
        $this->assertInternalType('bool', Collection::minValue(''));
        $this->assertInternalType('bool', Collection::minValue(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::minValue(new stdClass()));
        $this->assertFalse(Collection::minValue(''));
        $this->assertFalse(Collection::minValue(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::minValue(new stdClass()));
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
        $this->assertInternalType('bool', Collection::existsKey('', 0));
        $this->assertInternalType('bool', Collection::existsKey(NULL, 1));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::existsKey(new stdClass(), 2));
        $this->assertFalse(Collection::existsKey('', 3));
        $this->assertFalse(Collection::existsKey(NULL, 4));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::existsKey(new stdClass(), 5));
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
        $this->assertInternalType('bool', Collection::existsValue('', 'a'));
        $this->assertInternalType('bool', Collection::existsValue(NULL, 'b'));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::existsValue(new stdClass(), 'c'));
        $this->assertFalse(Collection::existsValue('', 'd'));
        $this->assertFalse(Collection::existsValue(NULL, 'e'));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::existsValue(new stdClass(), 'f'));
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
        // @todo implement test for Collection::filter($array, $callback)
    }

    /**
     *
     */
    public function testExplode()
    {
        $this->assertInternalType('bool', Collection::explode('', 'a'));
        $this->assertInternalType('bool', Collection::explode(NULL, 'b'));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::explode(new stdClass(), 'c'));
        $this->assertFalse(Collection::explode('', 'd'));
        $this->assertFalse(Collection::explode(NULL, 'e'));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::explode(new stdClass(), 'f'));
        $this->assertEquals(['a', 'c'], Collection::explode('abc', 'b'));
    }

    /**
     *
     */
    public function testImplode()
    {
        $this->assertInternalType('bool', Collection::implode('', 'a'));
        $this->assertInternalType('bool', Collection::implode(NULL, 'b'));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::implode(new stdClass(), 'c'));
        $this->assertFalse(Collection::implode('', 'd'));
        $this->assertFalse(Collection::implode(NULL, 'e'));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::implode(new stdClass(), 'f'));
        $this->assertEquals('a,b,c', Collection::implode(['a', 'b', 'c'], ','));
    }

    /**
     *
     */
    public function testIsEmpty()
    {
        $this->assertInternalType('bool', Collection::isEmpty('', 'a'));
        $this->assertInternalType('bool', Collection::isEmpty(NULL, 'b'));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::isEmpty(new stdClass(), 'c'));
        $this->assertFalse(Collection::isEmpty('', 'd'));
        $this->assertFalse(Collection::isEmpty(NULL, 'e'));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::isEmpty(new stdClass(), 'f'));
        $this->assertTrue(Collection::isEmpty([]));
        $this->assertFalse(Collection::isEmpty(['a']));
    }

    /**
     *
     */
    public function testIsNotEmty()
    {
        $this->assertInternalType('bool', Collection::isNotEmpty('', 'a'));
        $this->assertInternalType('bool', Collection::isNotEmpty(NULL, 'b'));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Collection::isNotEmpty(new stdClass(), 'c'));
        $this->assertFalse(Collection::isNotEmpty('', 'd'));
        $this->assertFalse(Collection::isNotEmpty(NULL, 'e'));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Collection::isNotEmpty(new stdClass(), 'f'));
        $this->assertTrue(Collection::isNotEmpty(['a', 'b', 'c']));
        $this->assertFalse(Collection::isNotEmpty([]));
    }
}
