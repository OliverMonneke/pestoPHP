<?php

namespace Codersquad\Pestophp\Tests\Mvc;

use Codersquad\Pestophp\Mvc\Router;
use Codersquad\Pestophp\Request\Request;
use PHPUnit_Framework_TestCase;

/**
 * Class RouterTest
 * @package Mvc
 */
class RouterTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testInit()
    {
        Request::set('controller', '');
        Request::set('action', '');
        $router = Router::getInstance();
        $this->assertEquals('This is the base controller and the default action', $router->init());
    }
}
 