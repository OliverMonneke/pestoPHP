<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 14:06
 */

namespace Datatype;


use Codersquad\Pestophp\Datatype\Object;
use stdClass;

/**
 * Class ObjectTest
 * @package Datatype
 */
class ObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    private $_object;

    /**
     *
     */
    protected function setUp()
    {
        $this->_object = new \stdClass();
        $this->_object->string1 = 'abc';
    }

    /**
     *
     */
    public function testIsValid()
    {
        $this->assertInternalType('bool', Object::isValid(['a', 'b', 'c']));
        $this->assertInternalType('bool', Object::isValid(''));
        $this->assertInternalType('bool', Object::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Object::isValid(new stdClass()));
        $this->assertFalse(Object::isValid(['a', 'b', 'c']));
        $this->assertFalse(Object::isValid('abc'));
        $this->assertFalse(Object::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertTrue(Object::isValid(new stdClass()));
    }

    /**
     *
     */
    public function testToArray()
    {
        $this->assertInternalType('bool', Object::toArray(['a', 'b', 'c']));
        $this->assertInternalType('bool', Object::toArray(''));
        $this->assertInternalType('bool', Object::toArray(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('array', Object::toArray(new stdClass()));
        $this->assertFalse(Object::toArray(['a', 'b', 'c']));
        $this->assertFalse(Object::toArray('abc'));
        $this->assertFalse(Object::toArray(NULL));
        $this->assertEquals(['string1' => 'abc'], Object::toArray($this->_object));
    }
}
 