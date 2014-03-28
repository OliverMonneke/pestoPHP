<?php
use Codersquad\Pestophp\Filesystem\File;

/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 28.03.2014
 * Time: 17:35
 */

class FileTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var File
     */
    private $_file;

    public function testRemoveFile()
    {
        $this->assertTrue($this->_file->remove());
    }

    public function testCreateFileExisting()
    {
        $this->_file->create();
        $this->assertTrue($this->_file->create());
    }

    public function testCreateFileNotExisting()
    {
        $file = new File(__DIR__.'/../dummy.txt');
        $this->assertTrue($file->create());
        $file->remove();
    }

    public function testGetAccessTime()
    {
        $this->assertInternalType('integer', $this->_file->getAccessTime());
    }

    public function testGetCreationTime()
    {
        $this->assertInternalType('integer', $this->_file->getCreationTime());
    }

    public function testGetGroup()
    {
        $this->assertInternalType('integer', $this->_file->getGroup());
    }

    public function testGetInode()
    {
        $this->assertInternalType('integer', $this->_file->getInode());
    }

    public function testGetModificationTime()
    {
        $this->assertInternalType('integer', $this->_file->getModificationTime());
    }

    public function testGetPerms()
    {
        $this->assertInternalType('integer', $this->_file->getPerms());
    }

    public function testGetSize()
    {
        $this->assertInternalType('integer', $this->_file->getSize());
    }

    public function testGetType()
    {
        $this->assertInternalType('string', $this->_file->getType());
    }

    public function testGetOwner()
    {
        $this->assertInternalType('integer', $this->_file->getOwner());
    }

    public function testWrite()
    {
        $this->assertEquals(30, $this->_file->write('where is my white coffee mocha'));
        $this->_file->emptyFile();
    }

    public function testRead()
    {
        $this->_file->write('great test string');
        $this->assertEquals('great test string', $this->_file->read());
        $this->_file->emptyFile();
    }

    public function testFileExistsWithExistingFile()
    {
        $this->assertTrue(File::fileExists(__DIR__.'/../resources/file.txt'));
    }

    public function testFileExistsWithNotExistingFile()
    {
        $this->assertFalse(File::fileExists(__DIR__.'/../resources/notExisting.txt'));
    }

    public function testReadWithLength()
    {
        $this->_file->write('great test string');
        $this->assertEquals('great test', $this->_file->read(10));
        $this->_file->emptyFile();
    }

    public function testCloseHandle()
    {
        $file = new File(__DIR__.'/../resources/file.txt');
        $this->assertTrue($file->__destruct());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->_file = new File(__DIR__.'/../resources/file.txt');
    }



    protected function tearDown()
    {
        parent::tearDown();
    }
}
 