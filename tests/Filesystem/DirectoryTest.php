<?php

namespace Codersquad\Pestophp\Tests\Filesystem;

use Codersquad\Pestophp\Filesystem\Directory;
use PHPUnit_Framework_TestCase;

/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 24.03.2014
 * Time: 16:27
 */
class DirectoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Directory
     */
    private $_directory;

    /**
     *
     */
    public function testGetArray()
    {
        $this->_directory->setRecursive(true);
        $this->_directory->setArray();

        $this->assertInternalType('array', $this->_directory->getArray());
    }

    /**
     *
     */
    public function testGetStartPath()
    {
        $this->assertEquals(__DIR__ . '/../resources', $this->_directory->getStartPath());
    }


    /**
     *
     */
    protected function setUp()
    {
        $this->_directory = new Directory();
        $this->_directory->setStartPath(__DIR__ . '/../resources');
    }


}
 