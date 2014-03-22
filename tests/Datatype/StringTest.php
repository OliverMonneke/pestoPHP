<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 14:22
 */

namespace Datatype;


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
        $this->assertInternalType('bool', String::lower(['a', 'b', 'c']));
        $this->assertInternalType('string', String::lower('abc'));
        $this->assertInternalType('string', String::lower(''));
        $this->assertInternalType('bool', String::lower(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::lower(new stdClass()));
        $this->assertFalse(String::lower(['a', 'b', 'c']));
        $this->assertFalse(String::lower(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::lower(new stdClass()));
        $this->assertFalse(String::lower(3212.5));
        $this->assertEquals('abc', String::lower('ABC'));
        $this->assertEquals('abc', String::lower('aBc'));
        $this->assertEquals('abc', String::lower('abc'));
    }

    /**
     *
     */
    public function testUpper()
    {
        $this->assertInternalType('bool', String::upper(['a', 'b', 'c']));
        $this->assertInternalType('string', String::upper('abc'));
        $this->assertInternalType('string', String::upper(''));
        $this->assertInternalType('bool', String::upper(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::upper(new stdClass()));
        $this->assertFalse(String::upper(['a', 'b', 'c']));
        $this->assertFalse(String::upper(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::upper(new stdClass()));
        $this->assertFalse(String::upper(3212.5));
        $this->assertEquals('ABC', String::upper('abc'));
        $this->assertEquals('ABC', String::upper('aBc'));
        $this->assertEquals('ABC', String::upper('ABC'));
    }

    /**
     *
     */
    public function testSubstringWithoutLengthWithoutStart()
    {
        $this->assertInternalType('bool', String::substring(['a', 'b', 'c']));
        $this->assertInternalType('string', String::substring('abc'));
        $this->assertInternalType('string', String::substring(''));
        $this->assertInternalType('bool', String::substring(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::substring(new stdClass()));
        $this->assertFalse(String::substring(['a', 'b', 'c']));
        $this->assertFalse(String::substring(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::substring(new stdClass()));
        $this->assertFalse(String::substring(3212.5));
        $this->assertEquals('abc', String::substring('abc'));
        $this->assertEquals('aBc', String::substring('aBc'));
        $this->assertEquals('abc', String::substring('abc'));
    }

    /**
     *
     */
    public function testSubstringWithoutLengthWithStart()
    {
        $this->assertInternalType('bool', String::substring(['a', 'b', 'c'], 1));
        $this->assertInternalType('string', String::substring('abc', 1));
        $this->assertInternalType('string', String::substring('', 1));
        $this->assertInternalType('bool', String::substring(NULL, 1));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::substring(new stdClass(), 1));
        $this->assertFalse(String::substring(['a', 'b', 'c'], 1));
        $this->assertFalse(String::substring(NULL, 1));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::substring(new stdClass(), 1));
        $this->assertFalse(String::substring(3212.5, 1));
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
        $this->assertInternalType('bool', String::substring(['a', 'b', 'c'], 1, 1));
        $this->assertInternalType('string', String::substring('abc', 1, 1));
        $this->assertInternalType('string', String::substring('', 1, 1));
        $this->assertInternalType('bool', String::substring(NULL, 1, 1));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::substring(new stdClass(), 1, 1));
        $this->assertFalse(String::substring(['a', 'b', 'c'], 1, 1));
        $this->assertFalse(String::substring(NULL, 1, 1));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::substring(new stdClass(), 1, 1));
        $this->assertFalse(String::substring(3212.5, 1, 1));
        $this->assertEquals('bc', String::substring('abc', 1, 2));
        $this->assertEquals('B', String::substring('aBc', 1, 1));
        $this->assertEquals('C', String::substring('ABC', 2, 1));
    }

    /**
     *
     */
    public function testLength()
    {
        $this->assertInternalType('bool', String::length(['a', 'b', 'c']));
        $this->assertInternalType('integer', String::length('abc'));
        $this->assertInternalType('integer', String::length(''));
        $this->assertInternalType('bool', String::length(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::length(new stdClass()));
        $this->assertFalse(String::length(['a', 'b', 'c']));
        $this->assertFalse(String::length(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::length(new stdClass()));
        $this->assertFalse(String::length(3212.5));
        $this->assertNotEquals(2, String::length('aBc'));
        $this->assertEquals(3, String::length('aBc'));
        $this->assertNotEquals(4, String::length('aBc'));
    }

    /**
     *
     */
    public function testStartsWithCaseSensitive()
    {
        $this->assertInternalType('bool', String::startsWith(['a', 'b', 'c'], 'a', true));
        $this->assertInternalType('bool', String::startsWith('abc', 'a', true));
        $this->assertInternalType('bool', String::startsWith('', 'a', true));
        $this->assertInternalType('bool', String::startsWith(NULL, 'a', true));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::startsWith(new stdClass(), 'a', true));
        $this->assertFalse(String::startsWith(['a', 'b', 'c'], 'a', true));
        $this->assertFalse(String::startsWith(NULL, 'a', true));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::startsWith(new stdClass(), 'a', true));
        $this->assertFalse(String::startsWith(3212.5, 'a', true));
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
        $this->assertInternalType('bool', String::startsWith(['a', 'b', 'c'], 'a', false));
        $this->assertInternalType('bool', String::startsWith('abc', 'a', false));
        $this->assertInternalType('bool', String::startsWith('', 'a', false));
        $this->assertInternalType('bool', String::startsWith(NULL, 'a', false));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::startsWith(new stdClass(), 'a', false));
        $this->assertFalse(String::startsWith(['a', 'b', 'c'], 'a', false));
        $this->assertFalse(String::startsWith(NULL, 'a', false));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::startsWith(new stdClass(), 'a', false));
        $this->assertFalse(String::startsWith(3212.5, 'a', false));
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
        $this->assertInternalType('bool', String::endsWith(['a', 'b', 'c'], 'c', true));
        $this->assertInternalType('bool', String::endsWith('abc', 'c', true));
        $this->assertInternalType('bool', String::endsWith('', 'c', true));
        $this->assertInternalType('bool', String::endsWith(NULL, 'c', true));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::endsWith(new stdClass(), 'c', true));
        $this->assertFalse(String::endsWith(['a', 'b', 'c'], 'c', true));
        $this->assertFalse(String::endsWith(NULL, 'c', true));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::endsWith(new stdClass(), 'c', true));
        $this->assertFalse(String::endsWith(3212.5, '5', true));
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
        $this->assertInternalType('bool', String::endsWith(['a', 'b', 'c'], 'c', false));
        $this->assertInternalType('bool', String::endsWith('abc', 'c', false));
        $this->assertInternalType('bool', String::endsWith('', 'c', false));
        $this->assertInternalType('bool', String::endsWith(NULL, 'c', false));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::endsWith(new stdClass(), 'c', false));
        $this->assertFalse(String::endsWith(['a', 'b', 'c'], 'c', false));
        $this->assertFalse(String::endsWith(NULL, 'c', false));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::endsWith(new stdClass(), 'c', false));
        $this->assertFalse(String::endsWith(3212.5, '5', false));
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
        $this->assertInternalType('bool', String::contains('b', ['a', 'b', 'c'], true));
        $this->assertInternalType('bool', String::contains('b', 'abc', true));
        $this->assertInternalType('bool', String::contains('b', '', true));
        $this->assertInternalType('bool', String::contains('c', 'abc', true));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::contains('b', new stdClass(), true));
        $this->assertFalse(String::contains('b', ['a', 'b', 'c'], true));
        $this->assertFalse(String::contains('b', NULL, true));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::contains('b', new stdClass(), true));
        $this->assertFalse(String::contains(2, 3212.5, true));
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
        $this->assertInternalType('bool', String::contains('b', ['a', 'b', 'c'], false));
        $this->assertInternalType('bool', String::contains('b', 'abc', false));
        $this->assertInternalType('bool', String::contains('b', '', false));
        $this->assertInternalType('bool', String::contains('c', 'abc', false));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::contains('b', new stdClass(), false));
        $this->assertFalse(String::contains('b', ['a', 'b', 'c'], false));
        $this->assertFalse(String::contains('b', NULL, false));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::contains('b', new stdClass(), false));
        $this->assertFalse(String::contains(2, 3212.5, false));
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
        $this->assertInternalType('bool', String::replace('b', ['a', 'b', 'c'], 'a', true));
        $this->assertInternalType('string', String::replace('b', 'abc', 'a', true));
        $this->assertInternalType('string', String::replace('b', '', 'a', true));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::replace('b', new stdClass(), 'a', true));
        $this->assertFalse(String::replace('b', ['a', 'b', 'c'], 'a', true));
        $this->assertFalse(String::replace('b', NULL, 'a', true));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::replace('b', new stdClass(), 'a', true));
        $this->assertFalse(String::replace(2, 3212.5, 'a', true));
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
        $this->assertInternalType('bool', String::replace('b', ['a', 'b', 'c'], 'a', false));
        $this->assertInternalType('string', String::replace('b', 'abc', 'a', false));
        $this->assertInternalType('string', String::replace('b', '', 'a', false));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::replace('b', new stdClass(), 'a', false));
        $this->assertFalse(String::replace('b', ['a', 'b', 'c'], 'a', false));
        $this->assertFalse(String::replace('b', NULL, 'a', false));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::replace('b', new stdClass(), 'a', false));
        $this->assertFalse(String::replace(2, 3212.5, 'a', false));
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
        $this->assertInternalType('bool', String::isEmpty(''));
        $this->assertInternalType('bool', String::isEmpty(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::isEmpty(new stdClass()));
        $this->assertTrue(String::isEmpty(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::isEmpty(new stdClass()));
        $this->assertTrue(String::isEmpty(''));
        $this->assertFalse(String::isEmpty('abc'));
    }

    /**
     *
     */
    public function testIsNotEmpty()
    {
        $this->assertInternalType('bool', String::isNotEmpty(''));
        $this->assertInternalType('bool', String::isNotEmpty(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', String::isNotEmpty(new stdClass()));
        $this->assertFalse(String::isNotEmpty(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(String::isNotEmpty(new stdClass()));
        $this->assertFalse(String::isNotEmpty(''));
        $this->assertTrue(String::isNotEmpty('abc'));
    }


}
 