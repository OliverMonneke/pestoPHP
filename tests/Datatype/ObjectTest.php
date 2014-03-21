<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 14:06
 */

namespace Datatype;


use Codersquad\Pestophp\Datatype\Object;

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
        $this->assertTrue(Object::isValid($this->_object));
    }

    /**
     *
     */
    public function testToArray()
    {
        $this->assertEquals(array('string1' => 'abc'), Object::toArray($this->_object));
    }
}
 