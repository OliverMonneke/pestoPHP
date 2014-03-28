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
    private function _evaluateDirectory($directory = NULL)
    {
        $directory = $this->_setDirectoryFallback($directory);

        /** @noinspection PhpAssignmentInConditionInspection */
        $this->_run($directory);
    }

    /**
     * Set data collection
     *
     * @return void
     */
    public function setArray()
    {
        $this->_evaluateDirectory();
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
    public function isRecursive()
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

    /**
     * @param $directory
     * @return string
     */
    private function _setDirectoryFallback($directory)
    {
        if (NULL === $directory) {
            $directory = $this->_startPath;
            return $directory;
        }
        return $directory;
    }

    /**
     * @param $directory
     * @param $file
     */
    private function _walkDirectoryRecursive($directory, $file)
    {
        if (is_dir($directory . DIRECTORY_SEPARATOR . $file) &&
            $this->isRecursive()
        ) {
            $this->_evaluateDirectory($directory . DIRECTORY_SEPARATOR . $file);
        }
    }

    /**
     * @param $directory
     * @param $file
     */
    private function _handleDirectory($directory, $file)
    {
        if (!preg_match('/^\.{1,2}$/', $file)) {
            $this->_array[] = $directory . DIRECTORY_SEPARATOR . $file;

            $this->_walkDirectoryRecursive($directory, $file);
        }
    }

    /**
     * @param $directory
     * @param $dh
     */
    private function _walkDirectory($directory, $dh)
    {
        while (($file = readdir($dh)) !== FALSE) {
            $this->_handleDirectory($directory, $file);
        }
    }

    /**
     * @param $directory
     */
    private function _run($directory)
    {
        /** @noinspection PhpAssignmentInConditionInspection */
        if ($dh = opendir($directory)) {
            $this->_walkDirectory($directory, $dh);
        }
    }
}
