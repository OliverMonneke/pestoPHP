<?php

/**
 * Base class for containers
 */
namespace Codersquad\Element;
use Codersquad\Datatype\Collection;
use Codersquad\Datatype\String;

/**
 * Class AContainer
 *
 * @package Codersquad\Element
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class AContainer extends AElement
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
        $source = '<'.$this->_tag;

        if (String::isNotEmpty($this->_dataTag))
        {
            $source .= ' '.$this->_dataTag.'="'.$this->_value.'" ';
        }

        if (String::isNotEmpty($this->_name))
        {
            $source .= ' name="'.$this->_name.'" ';
        }

        if (Collection::isNotEmpty($this->_class))
        {
            $source .= ' class="'.Collection::implode($this->_class, ' ').'" ';
        }

        if (String::isNotEmpty($this->_id))
        {
            $source .= ' id="'.$this->_id.'" ';
        }

        $source .= '>';

        foreach ($this->_elements as $_element)
        {
            $source .= $_element;
        }

        $source .= '</'.$this->_tag.'>';

        return $source;
    }
}
