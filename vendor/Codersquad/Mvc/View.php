<?php

/**
 * Template handling
 */
namespace Codersquad\Mvc;
use Codersquad\Datatype\Collection;
use Codersquad\Datatype\Object;
use Codersquad\Datatype\String;
use Codersquad\Filesystem\File;

/**
 * Class View
 *
 * @package Codersquad\Mvc
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
     * Content of template
     *
     * @var string
     */
    private $_content = NULL;

    /**
     * Array of template replacements
     *
     * @var array
     */
    private $_replacementArray = array();

    /**
     * Default constructor
     *
     * @param string $file The template
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
     * @param string $value Replacement
     */
    public function assign($key, $value = '')
    {
        $this->_replacementArray[$key] = $value;
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
            if (String::isString($_value))
            {
                $this->_replaceString($_key, $_value);
            }
            elseif(Collection::isArray($_value))
            {
                $this->_replaceArray($_key, $_value);
            }
            elseif(Object::isObject($_value))
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
        $matches = array();
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
     * Get template content
     *
     * @return string
     */
    public function getTemplate()
    {
        $this->_replace();
        return $this->_content;
    }
}