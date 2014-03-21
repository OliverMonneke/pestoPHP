<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 09:15
 */

namespace Datatype;

use Codersquad\Pestophp\Datatype\Collection;

/**
 * Class CollectionTest
 * @package Datatype
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $_testArray1 = array('a', 'b', 'c');
    /**
     * @var array
     */
    private $_testArray2 = array('x', 'y', 'z');
    /**
     * @var string
     */
    private $_testString = 'abc';

    /**
     *
     */
    public function testToArray()
    {
        $this->assertInternalType('array', Collection::toArray($this->_testString));
    }

    /**
     *
     */
    public function testIsValid()
    {
        $this->assertTrue(true, Collection::isValid($this->_testArray1));
    }

    /**
     *
     */
    public function testLenth()
    {
        $this->assertEquals(count($this->_testArray1), Collection::length($this->_testArray1));
    }

    /**
     *
     */
    public function testMax()
    {
        $this->assertEquals(max($this->_testArray1), Collection::maxValue($this->_testArray1));
    }

    /**
     *
     */
    public function testMin()
    {
        $this->assertEquals(min($this->_testArray1), Collection::minValue($this->_testArray1));
    }

    /**
     *
     */
    public function testFillValues()
    {
        $startIndex = 1;
        $count = 3;
        $value = 'abc';
        $testArray = array_fill($startIndex, $count, $value);
        $this->assertEquals($testArray, Collection::fillValues($startIndex, $count, $value));
    }

    /**
     *
     */
    public function testFillKeys()
    {
        $keys = array(0, 1, 2);
        $value = 'abc';
        $testArray = array_fill_keys($keys, $value);
        $this->assertEquals($testArray, Collection::fillKeys($keys, $value));
    }

    /**
     *
     */
    public function testMergeNotRecursive()
    {
        $this->assertEquals(array_merge($this->_testArray1, $this->_testArray2), Collection::merge($this->_testArray1, $this->_testArray2, false));
    }

    /**
     *
     */
    public function testMergeRecursive()
    {
        $this->assertEquals(array_merge($this->_testArray1, $this->_testArray2), Collection::merge($this->_testArray1, $this->_testArray2, true));
    }

    /**
     *
     */
    public function testExistsKey()
    {
        $this->assertTrue(Collection::existsKey($this->_testArray1, 1));
    }

    /**
     *
     */
    public function testExistsValue()
    {
        $this->assertTrue(Collection::existsValue($this->_testArray1, 'b'));
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
        $delimiter = 'b';
        $this->assertEquals(explode($delimiter, $this->_testString), Collection::explode($this->_testString, $delimiter));
    }

    /**
     *
     */
    public function testImplode()
    {
        $delimiter = ',';
        $this->assertEquals(implode($delimiter, $this->_testArray1), Collection::implode($this->_testArray1, $delimiter));
    }

    /**
     *
     */
    public function testIsEmpty()
    {
        $this->assertTrue(Collection::isEmpty([]));
    }

    /**
     *
     */
    public function testIsNotEmty()
    {
        $this->assertFalse(Collection::isEmpty($this->_testArray1));
    }
}
