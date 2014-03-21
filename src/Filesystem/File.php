<?php

/**
 * File handling
 */
namespace Codersquad\Pestophp\Filesystem;
use Codersquad\Pestophp\Datatype\Collection;
use Codersquad\Pestophp\Datatype\Number;
use Codersquad\Pestophp\Datatype\Resource;
use Codersquad\Pestophp\Datatype\String;

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
    private $_file = NULL;
    /**
     * File handle
     *
     * @var resource
     */
    private $_handle = NULL;

    /**
     * Default constructor
     *
     * @param string $file Filename
     *
     * @return \Codersquad\Filesystem\File
     */
    public function __construct($file)
    {
        $this->_file = $file;
    }

    /**
     * Set file handle
     *
     * @param string $mode Mode for file opening
     *
     * @return resource
     */
    private function _setHandle($mode)
    {
        if (Resource::isNotEmpty($this->_handle))
        {
            fclose($this->_handle);
        }

        $this->_handle = fopen($this->_file, $mode);

        return $this->_handle;
    }

    /**
     * Access time
     *
     * @return int
     */
    public function getAccessTime()
    {
        return fileatime($this->_file);
    }

    /**
     * Creation time
     *
     * @return int
     */
    public function getCreationTime()
    {
        return filectime($this->_file);
    }

    /**
     * Group
     *
     * @return int
     */
    public function getGroup()
    {
        return filegroup($this->_file);
    }

    /**
     * Inode
     *
     * @return int
     */
    public function getInode()
    {
        return fileinode($this->_file);
    }

    /**
     * Modification time
     *
     * @return int
     */
    public function getModificationTime()
    {
        return filemtime($this->_file);
    }

    /**
     * Permissions
     *
     * @return int
     */
    public function getPerms()
    {
        return fileperms($this->_file);
    }

    /**
     * File size
     *
     * @return int
     */
    public function getSize()
    {
        return filesize($this->_file);
    }

    /**
     * Type
     *
     * @return string
     */
    public function getType()
    {
        return filetype($this->_file);
    }

    /**
     * Owner
     *
     * @return int
     */
    public function getOwner()
    {
        return fileowner($this->_file);
    }

    /**
     * Delete file
     *
     * @return bool
     */
    public function remove()
    {
        return unlink($this->_file);
    }

    /**
     * Empty a file
     *
     * @return int
     */
    public function emptyFile()
    {
        return $this->write('', FALSE);
    }

    /**
     * Write a string into a file
     *
     * @param string $string The string to write
     * @param bool   $append Append to file
     *
     * @return int
     */
    public function write($string, $append = TRUE)
    {
        if ($append)
        {
            $mode = 'a';
        }
        else
        {
            $mode = 'w';
        }

        $this->_setHandle($mode);
        return fwrite($this->_handle, $string);
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
    public function read($length = 0, $asArray = FALSE)
    {
        if ($asArray &&
            Number::isZero($length))
        {
            return file($this->_file);
        }
        elseif(Number::isPositive($length))
        {
            $this->_setHandle('r');
            return fread($this->_handle, $length);
        }
        else
        {
            return Collection::implode($this->read(0, TRUE), '');
        }
    }

    /**
     * Create a file
     *
     * @return bool
     */
    public function create()
    {
        if (!self::fileExists($this->_file))
        {
            return touch($this->_file);
        }
        else
        {
            return TRUE;
        }
    }

    /**
     * Default destructor
     *
     * @return void
     */
    public function __destruct()
    {
        if (String::isNotEmpty($this->_handle))
        {
            fclose($this->_handle);
        }
    }
}
