<?php

/**
 * View handling
 */
namespace Codersquad\Pestophp\Mvc;

use Codersquad\Pestophp\Datatype\Collection;
use Codersquad\Pestophp\Datatype\Object;
use Codersquad\Pestophp\Datatype\String;
use Codersquad\Pestophp\Exception\FileNotFoundException;
use Codersquad\Pestophp\Filesystem\File;

/**
 * Class View
 *
 * @package Codersquad\Pestophp\Mvc
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class View
{
    /**
     * @var File
     */
    private $file = null;

    /**
     * Content of view
     *
     * @var string
     */
    private $content = null;

    /**
     * Array of view replacements
     *
     * @var array
     */
    private $replacementArray = [];

    /**
     * Check if already replaced
     *
     * @var bool
     */
    private $replaced = false;

    /**
     * Default constructor
     *
     * @param string $file The view
     * @throws \Codersquad\Pestophp\Exception\FileNotFoundException
     */
    public function __construct($file)
    {
        $this->setFile($file);
        $this->content = $this->file->read();
    }

    /**
     * Assign value => placeholder
     *
     * @param string|object|array $key   Placeholder
     * @param string              $value Replacement
     *
     * @return View
     */
    public function assign($key, $value = '')
    {
        $this->replaced = false;
        $this->replacementArray[$key] = $value;

        return $this;
    }

    /**
     * Replace marker
     *
     * @return void
     */
    private function replace()
    {
        foreach ($this->replacementArray as $_key => $_value) {
            if (String::isValid($_value)) {
                $this->replaceString($_key, $_value);
            } elseif(Collection::isValid($_value)) {
                $this->replaceArray($_key, $_value);
            } elseif(Object::isValid($_value)) {
                $this->replaceObject($_key, $_value);
            }
        }

        $this->cleanup();
    }

    /**
     * Replace object markers
     *
     * @param string $key   The key
     * @param object $value The object
     *
     * @return void
     */
    private function replaceObject($key, $value)
    {
        $array = Object::toArray($value);

        foreach ($array as $_key => $_value) {
            $this->replaceString($key.'.'.$_key, $_value);
        }
    }

    /**
     * Replace array
     *
     * @param string $key   The key
     * @param array  $array The array
     *
     * @return void
     */
    private function replaceArray($key, $array)
    {
        $matches = [];
        $result = '';

        preg_match('/{% for (.*) in '.$key.' %}(.*){% endfor %}/s', $this->content, $matches);
        $variableName = $matches[1];
        $blockContent = $matches[2];

        foreach ($array as $_item) {
            $result .= String::replace('{ '.$variableName.' }', $_item, $blockContent);
        }

        $this->content = String::replace($matches[0], $result, $this->content);
    }

    /**
     * Replace string
     *
     * @param string $key   The key
     * @param string $value The value
     *
     * @return void
     */
    private function replaceString($key, $value)
    {
        $this->content = String::replace('{ '.$key.' }', $value, $this->content);
    }

    /**
     * Remove all unneeded markers
     *
     * @return void
     */
    private function cleanup()
    {
        $this->content = preg_replace('/{ .* }/', '', $this->content);
        $this->content = preg_replace('/{% .* %}/', '', $this->content);
    }

    /**
     * Get view content
     *
     * @return string
     */
    public function getView()
    {
        if (!$this->replaced) {
            $this->replace();
            $this->replaced = true;
        }

        return $this->content;
    }

    /**
     * Setter for file
     *
     * @param $file
     * @throws \Codersquad\Pestophp\Exception\FileNotFoundException
     * @return View
     */
    public function setFile($file)
    {
        $this->_checkViewExists($file);
        $this->file = new File($file);

        return $this;
    }

    /**
     * @param $file
     * @throws \Codersquad\Pestophp\Exception\FileNotFoundException
     */
    private function _checkViewExists($file)
    {
        if (!File::fileExists($file)) {
            throw new FileNotFoundException;
        }
    }
}
