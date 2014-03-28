<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 28.03.2014
 * Time: 13:05
 */

namespace Mvc;


use Codersquad\Pestophp\Mvc\Router;
use Codersquad\Pestophp\Request\Request;

/**
 * Class RouterTest
 * @package Mvc
 */
class RouterTest extends \PHPUnit_Framework_TestCase
{

    public function testInit()
    {
        $this->markTestSkipped('Same problem as in class Classhandler');
        Request::set('controller', '');
        Request::set('action', '');
        $router = Router::getInstance();
        $this->assertEquals('This is the base controller and the default action', $router->init());
    }
}
 