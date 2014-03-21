<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 15:28
 */

namespace Mvc;


use Codersquad\Pestophp\Mvc\Controller;

/**
 * Class ControllerTest
 * @package Mvc
 */
class ControllerTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testDefaultAction()
    {
        $controller = new Controller();
        $this->assertEquals('This is the base controller and the default action', $controller->defaultAction());
    }
}
 