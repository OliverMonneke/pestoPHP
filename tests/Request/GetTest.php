<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 29.03.2014
 * Time: 11:17
 */

namespace Codersquad\Pestophp\Tests\Request;


use Codersquad\Pestophp\Request\Get;
use PHPUnit_Framework_TestCase;

/**
 * Class GetTest
 * @package Codersquad\Pestophp\Tests\Request
 */
class GetTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetAll()
    {
        $this->assertEquals(['abc' => 'xyz', 'def' => 'uvw'], Get::getAll());
    }

    /**
     *
     */
    public function testExecute()
    {
        $get = Get::getInstance();
        $get->execute();
        $this->assertEquals('xyz', Get::get('abc'));
        $this->assertEquals('uvw', Get::get('def'));
    }

    /**
     *
     */
    public function testHas()
    {
        $this->assertTrue(Get::has('abc'));
        $this->assertFalse(Get::has('xyz'));
    }

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
        $_GET['abc'] = 'xyz';
        $_GET['def'] = 'uvw';
    }


}
 