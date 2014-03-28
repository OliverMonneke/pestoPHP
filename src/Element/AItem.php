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

        $source = $this->_addName($source);

        $source = $this->_addClass($source);

        $source = $this->_addId($source);

        $source = $this->_addValue($source);

        $source .= ' />';

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    private function _addName($source)
    {
        if (String::isNotEmpty($this->_name))
        {
            $source .= ' name="' . $this->_name . '" ';
            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    private function _addClass($source)
    {
        if (Collection::isNotEmpty($this->_class)) {
            $source .= ' class="' . Collection::implode($this->_class, ' ') . '" ';
            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    private function _addId($source)
    {
        if (String::isNotEmpty($this->_id)) {
            $source .= ' id="' . $this->_id . '" ';
            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    private function _addValue($source)
    {
        if (NULL !== $this->_value) {
            $source .= ' value="' . $this->_value . '" ';
            return $source;
        }

        return $source;
    }
}
