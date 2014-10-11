<?php

namespace Codersquad\Pestophp\Tests\Mvc;

use Codersquad\Pestophp\Mvc\View;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * Class ViewTest
 * @package Mvc
 */
class ViewTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testAssignString()
    {
        $view = new View(__DIR__ . '/../resources/template.html');
        $view->assign('thirsty', 'white coffee mocha');
        $this->assertContains('white coffee mocha', $view->getView());
        $this->assertNotContains('thirsty', $view->getView());
    }

    /**
     *
     */
    public function testAssignArray()
    {
        $array = ['var1' => 'dummy var 1', 'var2' => 'dummy var 2'];
        $view = new View(__DIR__ . '/../resources/template.html');
        $view->assign('elements', $array);
        $this->assertContains('dummy var 1', $view->getView());
        $this->assertContains('dummy var 2', $view->getView());
        $this->assertNotContains('var1', $view->getView());
        $this->assertNotContains('var2', $view->getView());
        $this->assertNotContains('foreach', $view->getView());
    }

    /**
     *
     */
    public function testAssignObject()
    {
        $object = new stdClass();
        $object->var1 = 'dummy var 1';
        $object->var2 = 'dummy var 2';
        $view = new View(__DIR__ . '/../resources/template.html');
        $view->assign('object', $object);
        $this->assertContains('dummy var 1', $view->getView());
        $this->assertContains('dummy var 2', $view->getView());
        $this->assertNotContains('var1', $view->getView());
        $this->assertNotContains('var2', $view->getView());
        $this->assertNotContains('foreach', $view->getView());
    }

    /**
     *
     */
    public function testGetView()
    {
        $view = new View(__DIR__ . '/../resources/template.html');

        $this->assertContains('dummy text', $view->getView());
        $this->assertNotContains('{ ', $view->getView());
        $this->assertNotContains('{% ', $view->getView());
        $this->assertNotContains(' }', $view->getView());
        $this->assertNotContains(' %}', $view->getView());
    }

    /**
     *
     */
    public function testViewNotExists()
    {
        $this->setExpectedException('Codersquad\Pennephp\Exception\FileNotFoundException');
        new View('dummy.html');
    }
}
 