<?php

/**
 * File handling
 */
namespace Codersquad\Pestophp\Filesystem;

use Codersquad\Pestophp\Datatype\Collection;
use Codersquad\Pestophp\Datatype\Number;
use Codersquad\Pestophp\Datatype\Resource;

/**
 * Class File
 *
 * @package Codersquad\Pestophp\Filesystem
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class File
{
    /**
     * Filename
     *
     * @var string
     */
    private $file = null;

    /**
     * File handle
     *
     * @var resource
     */
    private $handle = null;

    /**
     * Default constructor
     *
     * @param string $file Filename
     *
     * @return \Codersquad\Pestophp\Filesystem\File
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Set file handle
     *
     * @param string $mode Mode for file opening
     *
     * @return resource
     */
    private function setHandle($mode)
    {
        $this->closeExistingHandle();

        $this->handle = fopen($this->file, $mode);

        return $this->handle;
    }

    /**
     * Access time
     *
     * @return int
     */
    public function getAccessTime()
    {
        return fileatime($this->file);
    }

    /**
     * Creation time
     *
     * @return int
     */
    public function getCreationTime()
    {
        return filectime($this->file);
    }

    /**
     * Group
     *
     * @return int
     */
    public function getGroup()
    {
        return filegroup($this->file);
    }

    /**
     * Inode
     *
     * @return int
     */
    public function getInode()
    {
        return fileinode($this->file);
    }

    /**
     * Modification time
     *
     * @return int
     */
    public function getModificationTime()
    {
        return filemtime($this->file);
    }

    /**
     * Permissions
     *
     * @return int
     */
    public function getPerms()
    {
        return fileperms($this->file);
    }

    /**
     * File size
     *
     * @return int
     */
    public function getSize()
    {
        return filesize($this->file);
    }

    /**
     * Type
     *
     * @return string
     */
    public function getType()
    {
        return filetype($this->file);
    }

    /**
     * Owner
     *
     * @return int
     */
    public function getOwner()
    {
        return fileowner($this->file);
    }

    /**
     * Delete file
     *
     * @return bool
     */
    public function remove()
    {
        return unlink($this->file);
    }

    /**
     * Empty a file
     *
     * @return int
     */
    public function emptyFile()
    {
        return $this->write('', false);
    }

    /**
     * Write a string into a file
     *
     * @param string $string The string to write
     * @param bool   $append Append to file
     *
     * @return int
     */
    public function write($string, $append = true)
    {
        $mode = $this->getMode($append);
        $this->setHandle($mode);

        return fwrite($this->handle, $string);
    }

    /**
     * Check if file exists
     *
     * @param string $file The filename
     *
     * @return bool
     */
    public static function fileExists($file)
    {
        return file_exists($file);
    }

    /**
     * Read content from file
     *
     * @param int  $length  Length of content to read
     * @param bool $asArray Get as array
     *
     * @return array|string
     */
    public function read($length = 0, $asArray = false)
    {
        if ($asArray &&
            Number::isZero($length)) {

            return file($this->file);
        }
        elseif(Number::isPositive($length)) {
            $this->setHandle('r');

            return fread($this->handle, $length);
        } else {
            return Collection::implode($this->read(0, true), '');
        }
    }

    /**
     * Create a file
     *
     * @return bool
     */
    public function create()
    {
        if (!self::fileExists($this->file)) {
            return touch($this->file);
        }

        return true;
    }

    /**
     * Default destructor
     *
     * @return bool
     */
    public function __destruct()
    {
        if (Resource::isNotEmpty($this->handle)) {
            return fclose($this->handle);
        }

        return true;
    }

    /**
     *
     */
    private function closeExistingHandle()
    {
        if (Resource::isNotEmpty($this->handle)) {
            fclose($this->handle);
        }
    }

    /**
     * @param $append
     * @return string
     */
    private function getMode($append)
    {
        if ($append) {
            $mode = 'a';

            return $mode;
        } else {
            $mode = 'w';

            return $mode;
        }
    }
}
