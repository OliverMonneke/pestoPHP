<?php

/**
 * Abstract base class for elements
 */
namespace Codersquad\Element;

/**
 * Class AElement
 *
 * @package Codersquad\Element
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class AElement
{
    /**
     * @var string
     */
    protected $_tag = NULL;

    /**
     * @var string
     */
    protected $_value = NULL;

    /**
     * @var array
     */
    protected $_class = array();

    /**
     * @var string
     */
    protected $_id = NULL;

    /**
     * @var string
     */
    protected $_name = NULL;

    /**
     * Setter for class
     *
     * @param array $class The classes
     *
     * @return AElement
     */
    public function setClass($class)
    {
        $this->_class = $class;

        return $this;
    }

    /**
     * Add a single class
     *
     * @param string $class The class
     *
     * @return AElement
     */
    public function addClass($class)
    {
        $this->_class[] = $class;

        return $this;
    }

    /**
     * Getter for classes
     *
     * @return array
     */
    public function getClass()
    {
        return $this->_class;
    }

    /**
     * Setter for id
     *
     * @param string $id The id
     *
     * @return AElement
     */
    public function setId($id)
    {
        $this->_id = $id;

        return $this;
    }

    /**
     * Getter for id
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Setter for name
     *
     * @param string $name The name
     *
     * @return AElement
     */
    public function setName($name)
    {
        $this->_name = $name;

        return $this;
    }

    /**
     * Getter for name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Setter for value
     *
     * @param string $value The value
     *
     * @return AElement
     */
    public function setValue($value)
    {
        $this->_value = $value;

        return $this;
    }

    /**
     * Getter for value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }
}
