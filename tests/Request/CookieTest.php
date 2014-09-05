<?php

namespace Codersquad\Pestophp\Tests\Request;

use Codersquad\Pestophp\Request\Cookie;
use PHPUnit_Framework_TestCase;

/**
 * Class CookieTest
 * @package Codersquad\Pestophp\Tests\Request
 */
class CookieTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testExecute()
    {
        $cookies = Cookie::getInstance();
        $cookies->execute();
        $this->assertEquals('xyz', Cookie::get('abc'));
        $this->assertEquals('uvw', Cookie::get('def'));
    }

    /**
     *
     */
    public function testHas()
    {
        $this->assertTrue(Cookie::has('abc'));
        $this->assertFalse(Cookie::has('xyz'));
    }

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
        $_COOKIE['abc'] = 'xyz';
        $_COOKIE['def'] = 'uvw';
    }
}
 