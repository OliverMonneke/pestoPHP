<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 14:41
 */

namespace Classmanagement;
use Codersquad\Pestophp\Classmanagement\ClassHandler;
use Codersquad\Pestophp\Configuration\PathConfiguration;


/**
 * Class ClassHandlerTest
 * @package Classmanagement
 */
class ClassHandlerTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        PathConfiguration::set('src', '');

        if(!defined('BASE_PATH'))
        {
            define('BASE_PATH', __DIR__.'/../../');
        }
    }

    /**
     *
     */
    public function testLoadController()
    {
        $classData = ClassHandler::loadController('', '');
        $this->assertEquals(['controller' => 'Codersquad\\Pestophp\\Mvc\\Controller', 'action' => 'defaultAction'], $classData);
    }
}
 