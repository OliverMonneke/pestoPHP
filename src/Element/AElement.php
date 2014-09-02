<?php

/**
 * Abstract base class for elements
 */
namespace Codersquad\Pestophp\Element;

/**
 * Class AElement
 *
 * @package Codersquad\Pestophp\Element
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class AElement
{
    /**
     * @var string
     */
    protected $tag = null;

    /**
     * @var string
     */
    protected $value = null;

    /**
     * @var array
     */
    protected $class = [];

    /**
     * @var string
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * Add a single class
     *
     * @param string $class The class
     *
     * @return AElement
     */
    public function addClass($class)
    {
        $this->class[] = $class;

        return $this;
    }

    /**
     * Getter for classes
     *
     * @return array
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Setter for id
     *
     * @param string $cssId The id
     *
     * @return AElement
     */
    public function setId($cssId)
    {
        $this->id = $cssId;

        return $this;
    }

    /**
     * Getter for id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
        $this->name = $name;

        return $this;
    }

    /**
     * Getter for name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
        $this->value = $value;

        return $this;
    }

    /**
     * Getter for value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
