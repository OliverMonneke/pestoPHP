<?php

namespace Codersquad\Pestophp\Tests\Configuration;

use Codersquad\Pestophp\Configuration\DatabaseConfiguration;
use PHPUnit_Framework_TestCase;

/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 28.03.2014
 * Time: 22:56
 */
class DatabaseConfigurationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DatabaseConfiguration
     */
    private $config;

    /**
     *
     */
    public function testExport()
    {
        $this->assertFalse($this->config->export());
    }

    /**
     *
     */
    protected function setUp()
    {

        parent::setUp();

        if (!defined('BASE_PATH')) {
            define('BASE_PATH', __DIR__ . '/..');
        }

        $this->config = DatabaseConfiguration::getInstance();
        $this->config->setPath('tests/resources');
    }
}
