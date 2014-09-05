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
class Directory
{

    /**
     * Starting directory
     *
     * @var string
     */
    private $startPath = null;

    /**
     * Recursive
     *
     * @var bool
     */
    private $recursive = false;

    /**
     * @var array
     */
    private $array = [];

    /**
     * Default constructor
     *
     * @param string $startPath Start path
     * @param bool $recursive Recursive
     *
     * @return \Codersquad\Pestophp\Filesystem\Directory
     */
    public function __construct($startPath = null, $recursive = false)
    {
        $this->setStartPath($startPath);
        $this->setRecursive($recursive);
    }

    /**
     * Setter for recursive
     *
     * @param bool $recursive Recursive
     *
     * @return $this
     */
    public function setRecursive($recursive)
    {
        $this->recursive = $recursive;

        return $this;
    }

    /**
     * Set data collection
     *
     * @return void
     */
    public function setArray()
    {
        $this->evaluateDirectory();
    }

    /**
     * Walk through directory
     *
     * @param string $directory Directory
     *
     * @return void
     */
    private function evaluateDirectory($directory = null)
    {
        $directory = $this->setDirectoryFallback($directory);

        /** @noinspection PhpAssignmentInConditionInspection */
        $this->run($directory);
    }

    /**
     * @param $directory
     * @return string
     */
    private function setDirectoryFallback($directory)
    {
        if (null === $directory) {
            $directory = $this->startPath;
            return $directory;
        }

        return $directory;
    }

    /**
     * @param $directory
     */
    private function run($directory)
    {
        /** @noinspection PhpAssignmentInConditionInspection */
        if ($directoryHandle = opendir($directory)) {
            $this->walkDirectory($directory, $directoryHandle);
        }
    }

    /**
     * @param $directory
     * @param $directoryHandle
     */
    private function walkDirectory($directory, $directoryHandle)
    {
        while (($file = readdir($directoryHandle)) !== false) {
            $this->handleDirectory($directory, $file);
        }
    }

    /**
     * @param $directory
     * @param $file
     */
    private function handleDirectory($directory, $file)
    {
        if (!preg_match('/^\.{1,2}$/', $file)) {
            $this->array[] = $directory . DIRECTORY_SEPARATOR . $file;

            $this->walkDirectoryRecursive($directory, $file);
        }
    }

    /**
     * @param $directory
     * @param $file
     */
    private function walkDirectoryRecursive($directory, $file)
    {
        if (is_dir($directory . DIRECTORY_SEPARATOR . $file) &&
            $this->isRecursive()
        ) {
            $this->evaluateDirectory($directory . DIRECTORY_SEPARATOR . $file);
        }
    }

    /**
     * Getter for recursive
     *
     * @return bool
     */
    public function isRecursive()
    {
        return $this->recursive;
    }

    /**
     * Get data collection
     *
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * Getter for starting path
     *
     * @return string
     */
    public function getStartPath()
    {
        return $this->startPath;
    }

    /**
     * Setter for starting path
     *
     * @param string $startPath Start path
     *
     * @return $this
     */
    public function setStartPath($startPath)
    {
        $this->startPath = $startPath;

        return $this;
    }
}
