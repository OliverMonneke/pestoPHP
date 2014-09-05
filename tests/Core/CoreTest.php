<?php

namespace Codersquad\Pestophp\Tests\Core;

use Codersquad\Pestophp\Core\Core;
use PHPUnit_Framework_TestCase;

/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 28.03.2014
 * Time: 22:11
 */
class CoreTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testRunWithMvc()
    {
        $core = Core::getInstance();
        $core->setUseMvc(true);
        $this->assertTrue($core->run());
    }

    /**
     *
     */
    public function testRunWihoutMvc()
    {
        $core = Core::getInstance();
        $core->setUseMvc(false);
        $this->assertTrue($core->run());
    }


    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();

        if (!defined('BASE_PATH')) {
            define('BASE_PATH', __DIR__ . '/../../');
        }
    }
}
