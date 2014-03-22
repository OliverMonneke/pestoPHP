<?php

/**
 * View handling
 */
namespace Codersquad\Pestophp\Mvc;
use Codersquad\Pestophp\Datatype\Collection;
use Codersquad\Pestophp\Datatype\Object;
use Codersquad\Pestophp\Datatype\String;
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
    private $_file = NULL;

    /**
     * Content of view
     *
     * @var string
     */
    private $_content = NULL;

    /**
     * Array of view replacements
     *
     * @var array
     */
    private $_replacementArray = [];

    /**
     * Default constructor
     *
     * @param string $file The view
     */
    public function __construct($file)
    {
        $this->_file = new File($file);
        $this->_content = $this->_file->read();
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
        $this->_replacementArray[$key] = $value;

        return $this;
    }

    /**
     * Replace marker
     *
     * @return void
     */
    private function _replace()
    {
        foreach ($this->_replacementArray as $_key => $_value)
        {
            if (String::isValid($_value))
            {
                $this->_replaceString($_key, $_value);
            }
            elseif(Collection::isValid($_value))
            {
                $this->_replaceArray($_key, $_value);
            }
            elseif(Object::isValid($_value))
            {
                $this->_replaceObject($_key, $_value);
            }
        }

        $this->_cleanup();
    }

    /**
     * Replace object markers
     *
     * @param string $key   The key
     * @param object $value The object
     *
     * @return void
     */
    private function _replaceObject($key, $value)
    {
        $array = Object::toArray($value);

        foreach ($array as $_key => $_value)
        {
            $this->_replaceString($key.'.'.$_key, $_value);
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
    private function _replaceArray($key, $array)
    {
        $matches = [];
        $result = '';

        preg_match('/{% for (.*) in '.$key.' %}(.*){% endfor %}/s', $this->_content, $matches);
        $variableName = $matches[1];
        $blockContent = $matches[2];

        foreach ($array as $_item)
        {
            $result .= String::replace('{ '.$variableName.' }', $_item, $blockContent);
        }

        $this->_content = String::replace($matches[0], $result, $this->_content);
    }

    /**
     * Replace string
     *
     * @param string $key   The key
     * @param string $value The value
     *
     * @return void
     */
    private function _replaceString($key, $value)
    {
        $this->_content = String::replace('{ '.$key.' }', $value, $this->_content);
    }

    /**
     * Remove all unneeded markers
     *
     * @return void
     */
    private function _cleanup()
    {
        $this->_content = preg_replace('/{ .* }/', '', $this->_content);
    }

    /**
     * Get view content
     *
     * @return string
     */
    public function getView()
    {
        $this->_replace();
        return $this->_content;
    }

    /**
     * Setter for file
     *
     * @param $file
     * @return View
     */
    public function setFile($file)
    {
        $this->_file = $file;

        return $this;
    }
}