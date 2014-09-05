<?php

namespace Codersquad\Pestophp\Tests\Datatype;

use Codersquad\Pestophp\Datatype\Resource;
use stdClass;

/**
 * Class ResourceTest
 * @package Datatype
 */
class ResourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    private $_resource;

    /**
     *
     */
    public function testIsNotEmptyWithWrongDatatype()
    {
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Resource::isNotEmpty('abc'));
    }

    /**
     *
     */
    public function testIsValid()
    {
        $this->assertInternalType('bool', Resource::isValid(''));
        $this->assertInternalType('bool', Resource::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertInternalType('bool', Resource::isValid(new stdClass()));
        $this->assertFalse(Resource::isValid(''));
        $this->assertFalse(Resource::isValid(NULL));
        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Resource::isValid(new stdClass()));
        $this->assertTrue(Resource::isValid($this->_resource));
    }

    /**
     *
     */
    public function testIsEmpty()
    {
        $this->assertFalse(Resource::isEmpty(''));
        $this->assertFalse(Resource::isEmpty($this->_resource));
    }

    /**
     *
     */
    public function testIsNotEmpty()
    {
        $this->assertTrue(Resource::isNotEmpty($this->_resource));
    }

    /**
     *
     */
    protected function setUp()
    {
        $this->_resource = fopen($_SERVER['SCRIPT_NAME'], 'r');
    }

    /**
     *
     */
    protected function tearDown()
    {
        fclose($this->_resource);
    }
}
