<?php

namespace Codersquad\Pestophp\Tests\Mvc;

use Codersquad\Pestophp\Mvc\Controller;
use PHPUnit_Framework_TestCase;

/**
 * Class ControllerTest
 * @package Mvc
 */
class ControllerTest extends PHPUnit_Framework_TestCase
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
 