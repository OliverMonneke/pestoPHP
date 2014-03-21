<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 14:11
 */

namespace Datatype;


use Codersquad\Pestophp\Datatype\Resource;

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
    protected function setUp()
    {
        $this->_resource = fopen($_SERVER['SCRIPT_NAME'], 'r');
    }

    /**
     *
     */
    public function testIsValid()
    {
        $this->assertTrue(Resource::isValid($this->_resource));
    }

    /**
     *
     */
    public function testIsEmpty()
    {
        $this->assertTrue(Resource::isEmpty(''));
    }

    /**
     *
     */
    public function testIsNotEmpty()
    {
        $this->assertTrue(Resource::isNotEmpty('abc'));
    }

    /**
     *
     */
    protected function tearDown()
    {
        fclose($this->_resource);
    }


}
 