<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 14:22
 */

namespace Codersquad\Pestophp\Tests\Datatype;

use Codersquad\Pestophp\Datatype\String;
use stdClass;

/**
 * Class StringTest
 * @package Datatype
 */
class StringTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testIsValid()
    {
        $this->assertInternalType('bool', String::isValid(['a', 'b', 'c']));
        $this->assertInternalType('bool', String::isValid(''));
        $this->assertInternalType('bool', String::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::isValid(new stdClass()));
        $this->assertFalse(String::isValid(['a', 'b', 'c']));
        $this->assertTrue(String::isValid('abc'));
        $this->assertFalse(String::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::isValid(new stdClass()));
        $this->assertFalse(String::isValid(3212.5));
        $this->assertTrue(String::isValid('aBc'));
    }

    /**
     *
     */
    public function testLower()
    {
        $this->assertEquals('abc', String::lower('ABC'));
        $this->assertEquals('abc', String::lower('aBc'));
        $this->assertEquals('abc', String::lower('abc'));
    }

    /**
     *
     */
    public function testUpper()
    {
        $this->assertEquals('ABC', String::upper('abc'));
        $this->assertEquals('ABC', String::upper('aBc'));
        $this->assertEquals('ABC', String::upper('ABC'));
    }

    /**
     *
     */
    public function testSubstringWithoutLengthWithoutStart()
    {
        $this->assertEquals('abc', String::substring('abc'));
        $this->assertEquals('aBc', String::substring('aBc'));
        $this->assertEquals('abc', String::substring('abc'));
    }

    /**
     *
     */
    public function testSubstringWithoutLengthWithStart()
    {
        $this->assertEquals('abc', String::substring('abc', 0));
        $this->assertEquals('Bc', String::substring('aBc', 1));
        $this->assertEquals('C', String::substring('ABC', 2));
        $this->assertEquals('BC', String::substring('ABC', 1));
    }

    /**
     *
     */
    public function testSubstringWithLengthWithStart()
    {
        $this->assertEquals('bc', String::substring('abc', 1, 2));
        $this->assertEquals('B', String::substring('aBc', 1, 1));
        $this->assertEquals('C', String::substring('ABC', 2, 1));
    }

    /**
     *
     */
    public function testLength()
    {
        $this->assertNotEquals(2, String::length('aBc'));
        $this->assertEquals(3, String::length('aBc'));
        $this->assertNotEquals(4, String::length('aBc'));
    }

    /**
     *
     */
    public function testStartsWithCaseSensitive()
    {
        $this->assertTrue(String::startsWith('a', 'abc', true));
        $this->assertFalse(String::startsWith('a', 'xyz', true));
        $this->assertFalse(String::startsWith('A', 'abc', true));
        $this->assertFalse(String::startsWith('a', 'Abc', true));
    }

    /**
     *
     */
    public function testStartsWithCaseInsensitive()
    {
        $this->assertTrue(String::startsWith('a', 'abc', false));
        $this->assertFalse(String::startsWith('a', 'xyz', false));
        $this->assertTrue(String::startsWith('A', 'abc', false));
        $this->assertTrue(String::startsWith('a', 'Abc', false));
        $this->assertTrue(String::startsWith('a', 'ABC', false));
    }

    /**
     *
     */
    public function testEndsWithCaseSensitive()
    {
        $this->assertTrue(String::endsWith('c', 'abc', true));
        $this->assertFalse(String::endsWith('c', 'xyz', true));
        $this->assertFalse(String::endsWith('C', 'abc', true));
        $this->assertFalse(String::endsWith('C', 'Abc', true));
    }

    /**
     *
     */
    public function testEndsWithCaseInsensitive()
    {
        $this->assertTrue(String::endsWith('c', 'abc', false));
        $this->assertFalse(String::endsWith('c', 'xyz', false));
        $this->assertTrue(String::endsWith('C', 'abc', false));
        $this->assertTrue(String::endsWith('C', 'Abc', false));
    }

    /**
     *
     */
    public function testContainsCaseSensitive()
    {
        $this->assertTrue(String::contains('b', 'abc', true));
        $this->assertFalse(String::contains('b', 'xyz', true));
        $this->assertFalse(String::contains('B', 'abc', true));
        $this->assertTrue(String::contains('B', 'ABC', true));
    }

    /**
     *
     */
    public function testContainsCaseInsensitive()
    {
        $this->assertTrue(String::contains('b', 'abc', false));
        $this->assertFalse(String::contains('b', 'xyz', false));
        $this->assertTrue(String::contains('B', 'abc', false));
        $this->assertTrue(String::contains('b', 'ABC', false));
    }

    /**
     *
     */
    public function testReplaceCaseSensitive()
    {
        $this->assertEquals('aac', String::replace('b', 'a', 'abc', true));
        $this->assertEquals('xyz', String::replace('b', 'a', 'xyz', true));
        $this->assertEquals('abc', String::replace('B', 'a', 'abc', true));
        $this->assertEquals('AAC', String::replace('B', 'A', 'ABC', 'a', true));
    }

    /**
     *
     */
    public function testReplaceCaseInsensitive()
    {
        $this->assertEquals('aac', String::replace('b', 'a', 'abc', false));
        $this->assertEquals('xyz', String::replace('b', 'a', 'xyz', false));
        $this->assertEquals('aac', String::replace('B', 'a', 'abc', false));
        $this->assertEquals('AAC', String::replace('B', 'A', 'ABC', 'a', false));
    }

    /**
     *
     */
    public function testIsEmpty()
    {
        $this->assertTrue(String::isEmpty(''));
        $this->assertFalse(String::isEmpty('abc'));
    }

    /**
     *
     */
    public function testIsNotEmpty()
    {
        $this->assertFalse(String::isNotEmpty(''));
        $this->assertTrue(String::isNotEmpty('abc'));
    }

    public function testLowerWithWrongDatatype()
    {
        $this->assertFalse(String::lower(['a', 'b', 'c']));
    }

    public function testUpperWithWrongDatatype()
    {
        $this->assertFalse(String::upper(['a', 'b', 'c']));
    }

    public function testSubstringWithWrongDatatype()
    {
        $this->assertFalse(String::substring(['a', 'b', 'c']));
    }

    public function testLengthWithWrongDatatype()
    {
        $this->assertFalse(String::length(['a', 'b', 'c']));
    }

    public function testStartsWithWithWrongDatatype()
    {
        $this->assertFalse(String::startsWith(['a', 'b', 'c'], 'a'));
    }

    public function testContainsWithWrongDatatype()
    {
        $this->assertFalse(String::contains('b', ['a', 'b', 'c']));
    }

    public function testReplaceWithWrongDatatype()
    {
        $this->assertFalse(String::replace('b', ['a', 'b', 'c'], 'abc'));
    }

    public function testIsNotEmptyWithWrongDatatype()
    {
        $this->assertFalse(String::isNotEmpty(['a', 'b', 'c']));
    }

    public function testLowerFirst()
    {
        $this->assertEquals('aBc', String::lowerFirst('ABc'));
    }

    public function testUpperFirst()
    {
        $this->assertEquals('ABc', String::upperFirst('aBc'));
    }
}
 