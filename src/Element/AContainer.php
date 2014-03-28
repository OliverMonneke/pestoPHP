<?php

/**
 * Base class for containers
 */
namespace Codersquad\Pestophp\Element;

use Codersquad\Pestophp\Datatype\Collection;
use Codersquad\Pestophp\Datatype\String;

/**
 * Class AContainer
 *
 * @package Codersquad\Element
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class AContainer extends AElement
{
    /**
     * @var string
     */
    protected $_dataTag = NULL;

    /**
     * @var array
     */
    protected $_elements = [];

    /**
     * Add an element
     *
     * @param AElement $element The element
     *
     * @return AContainer
     */
    public function addElement(AElement $element)
    {
        $this->_elements[] = $element;

        return $this;
    }

    /**
     * Render container
     *
     * @return string
     */
    public function __toString()
    {
        $source = '<' . $this->_tag;

        $source = $this->_addDataTag($source);

        $source = $this->_addName($source);

        $source = $this->_addClass($source);

        $source = $this->_addId($source);

        $source .= '>';

        $source = $this->_addChildElements($source);

        $source .= '</' . $this->_tag . '>';

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    protected function _addDataTag($source)
    {
        if (String::isNotEmpty($this->_dataTag)) {
            $source .= ' ' . $this->_dataTag . '="' . $this->_value . '"';
            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    protected function _addName($source)
    {
        if (String::isNotEmpty($this->_name)) {
            $source .= ' name="' . $this->_name . '"';
            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    protected function _addClass($source)
    {
        if (Collection::isNotEmpty($this->getClass())) {
            $source .= ' class="' . Collection::implode($this->getClass(), ' ') . '"';
            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    protected function _addId($source)
    {
        if (String::isNotEmpty($this->getId())) {
            $source .= ' id="' . $this->getId() . '"';
            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    protected function _addChildElements($source)
    {
        foreach ($this->_elements as $_element) {
            $source .= $_element;
        }

        return $source;
    }
}
