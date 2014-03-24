<?php

/**
 * Directory handling
 */
namespace Codersquad\Pestophp\Filesystem;
use Codersquad\Pestophp\Classmanagement\AIterator;
use Codersquad\Pestophp\Classmanagement\IIterator;

/**
 * Class Directory
 *
 * @package Codersquad\Pestophp\Filesystem
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Directory extends AIterator implements IIterator
{

    /**
     * Starting directory
     *
     * @var string
     */
    private $_startPath = NULL;

    /**
     * Recursive
     *
     * @var bool
     */
    private $_recursive = FALSE;

    /**
     * Default constructor
     *
     * @param string $startPath Start path
     * @param bool $recursive Recursive
     *
     * @return \Codersquad\Pestophp\Filesystem\Directory
     */
    public function __construct($startPath = NULL, $recursive = FALSE)
    {
        $this->setStartPath($startPath);
        $this->setRecursive($recursive);
    }

    /**
     * Walk through directory
     *
     * @param string $directory Directory
     *
     * @return void
     */
    private function _walkDirectory($directory = NULL)
    {
        if (NULL === $directory)
        {
            $directory = $this->_startPath;
        }

        /** @noinspection PhpAssignmentInConditionInspection */
        if ($dh = opendir($directory))
        {
            while (($file = readdir($dh)) !== FALSE)
            {
                if (!preg_match('/^\.{1,2}$/', $file))
                {
                    $this->_array[] = $directory . DIRECTORY_SEPARATOR . $file;

                    if (is_dir($directory . DIRECTORY_SEPARATOR . $file) &&
                            $this->getRecursive())
                    {
                        $this->_walkDirectory($directory . DIRECTORY_SEPARATOR . $file);
                    }
                }
            }
        }
    }

    /**
     * Set data collection
     *
     * @return void
     */
    public function setArray()
    {
        $this->_walkDirectory();
    }

    /**
     * Get data collection
     *
     * @return array
     */
    public function getArray()
    {
        return $this->_array;
    }

    /**
     * Getter for starting path
     *
     * @return string
     */
    public function getStartPath()
    {
        return $this->_startPath;
    }

    /**
     * Getter for recursive
     *
     * @return bool
     */
    public function getRecursive()
    {
        return $this->_recursive;
    }

    /**
     * Setter for starting path
     *
     * @param string $_startPath Start path
     *
     * @return void
     */
    public function setStartPath($_startPath)
    {
        $this->_startPath = $_startPath;
    }

    /**
     * Setter for recursive
     *
     * @param bool $_recursive Recursive
     *
     * @return void
     */
    public function setRecursive($_recursive)
    {
        $this->_recursive = $_recursive;
    }
}
