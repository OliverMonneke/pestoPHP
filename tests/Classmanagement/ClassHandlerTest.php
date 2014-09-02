<?php

namespace Codersquad\Pestophp\Tests\Classmanagement;

use Codersquad\Pestophp\Classmanagement\ClassHandler;
use Codersquad\Pestophp\Configuration\PathConfiguration;

/**
 * Class ClassHandlerTest
 * @package Classmanagement
 */
class ClassHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testLoadController()
    {
        $classData = ClassHandler::loadController('', '');
        $this->assertEquals(['controller' => 'Codersquad\Pestophp\Mvc\Controller', 'action' => 'defaultAction'], $classData);
    }

    /**
     *
     */
    protected function setUp()
    {
        PathConfiguration::set('src', '');

        if (!defined('BASE_PATH')) {
            define('BASE_PATH', __DIR__ . '/../../');
        }
    }
}
 