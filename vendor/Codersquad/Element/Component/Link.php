<?php

namespace Codersquad\Element\Component;
use Codersquad\Datatype\Collection;
use Codersquad\Datatype\String;
use Codersquad\Element\AContainer;

class Link extends AContainer
{
    /**
     * @var string
     */
    protected $_tag = 'a';

    /**
     * @var string
     */
    protected $_dataTag = 'href';

    /**
     * @var string
     */
    protected $_href = '';

    /**
     * @var string
     */
    protected $_target = NULL;

    /**
     * Setter for href
     *
     * @param string $href The href
     *
     * @return Link
     */
    public function setHref($href)
    {
        $this->_href = $href;

        return $this;
    }

    /**
     * Getter for href
     *
     * @return string
     */
    public function getHref()
    {
        return $this->_href;
    }

    /**
     * Setter for target
     *
     * @param string $target The target
     *
     * @return Link
     */
    public function setTarget($target)
    {
        $this->_target = $target;

        return $this;
    }

    /**
     * Getter for target
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->_target;
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
            $source .= ' '.$this->_dataTag.'="'.$this->_href.'" ';
        }

        if (String::isNotEmpty($this->_target))
        {
            $source .= ' target="'.$this->_target.'" ';
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

        $source .= '>'.$this->_value;

        foreach ($this->_elements as $_element)
        {
            $source .= $_element;
        }

        $source .= '</'.$this->_tag.'>';

        return $source;
    }
}