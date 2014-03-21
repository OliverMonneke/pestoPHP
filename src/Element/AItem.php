<?php

/**
 * Abstract base class for items
 */
namespace Codersquad\Pestophp\Element;
use Codersquad\Pestophp\Datatype\Collection;
use Codersquad\Pestophp\Datatype\String;

/**
 * Class AItem
 *
 * @package Codersquad\Pestophp\Element
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class AItem extends AElement
{
    /**
     * Render item
     *
     * @return string
     */
    public function __toString()
    {
        $source = '<'.$this->_tag;

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

        if (NULL !== $this->_value)
        {
            $source .= ' value="'.$this->_value.'" ';
        }

        $source .= ' />';

        return $source;
    }
}
