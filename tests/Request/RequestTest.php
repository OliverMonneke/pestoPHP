<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 29.03.2014
 * Time: 11:46
 */

namespace Codersquad\Pestophp\Tests\Request;


use Codersquad\Pestophp\Request\Request;
use PHPUnit_Framework_TestCase;

/**
 * Class RequestTest
 * @package Codersquad\Pestophp\Tests\Request
 */
class RequestTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testExecute()
    {
        $request = Request::getInstance();
        $request->execute();
        $this->assertEquals('xyz', Request::get('abc'));
        $this->assertEquals('uvw', Request::get('def'));
    }

    /**
     *
     */
    public function testHas()
    {
        $this->assertTrue(Request::has('abc'));
        $this->assertFalse(Request::has('xyz'));
    }

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
        $_REQUEST['abc'] = 'xyz';
        $_REQUEST['def'] = 'uvw';
    }
}
 