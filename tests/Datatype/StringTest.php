<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 14:22
 */

namespace Datatype;


use Codersquad\Pestophp\Datatype\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    private $_testString = 'aBc';
    private $_testStringLower = 'abc';
    private $_testStringUpper = 'ABC';
    private $_testArray = ['a', 'b', 'c'];

    public function testIsValid()
    {
        $this->assertTrue(String::isValid($this->_testString));
    }

    public function testLower()
    {
        $this->assertEquals($this->_testStringLower, String::lower($this->_testStringUpper));
    }

    public function testUpper()
    {
        $this->assertEquals($this->_testStringUpper, String::upper($this->_testStringLower));
    }

    public function testSubstring()
    {
        $this->assertEquals('a', String::substring($this->_testString, 0, 1));
    }

    public function testLength()
    {
        $this->assertEquals(3, String::length($this->_testString));
    }

    public function testStartsWithCaseSensitive()
    {
        $this->assertTrue(String::startsWith('a', $this->_testStringLower, true));
    }

    public function testStartsWithCaseInsensitive()
    {
        $this->assertTrue(String::startsWith('a', $this->_testStringUpper, false));
    }

    public function testEndsWithCaseSensitive()
    {
        $this->assertTrue(String::endsWith('c', $this->_testStringLower, true));
    }

    public function testEndsWithCaseInsensitive()
    {
        $this->assertTrue(String::endsWith('c', $this->_testStringUpper, false));
    }

    public function testContainsCaseSensitive()
    {
        $this->assertTrue(String::contains('b', $this->_testStringLower, true));
    }

    public function testContainsCaseInsensitive()
    {
        $this->assertTrue(String::contains('b', $this->_testStringUpper, false));
    }

    public function testReplaceCaseSensitive()
    {
        $this->assertEquals('acc', String::replace('b', 'c', $this->_testStringLower, true));
    }

    public function testReplaceCaseInsensitive()
    {
        $this->assertEquals('AcC', String::replace('b', 'c', $this->_testStringUpper, false));
    }

    public function testIsEmpty()
    {
        $this->assertTrue(String::isEmpty(''));
    }

    public function testIsNotEmpty()
    {
        $this->assertTrue(String::isNotEmpty($this->_testString));
    }


}
 