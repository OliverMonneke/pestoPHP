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
    protected $dataTag = null;

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
        $source = '<' . $this->tag;

        $source = $this->addDataTag($source);

        $source = $this->addName($source);

        $source = $this->addClass($source);

        $source = $this->addId($source);

        $source .= '>';

        $source = $this->addChildElements($source);

        $source .= '</' . $this->tag . '>';

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    protected function addDataTag($source)
    {
        if (String::isNotEmpty($this->dataTag)) {
            $source .= ' ' . $this->dataTag . '="' . $this->value . '"';

            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    protected function addName($source)
    {
        if (String::isNotEmpty($this->name)) {
            $source .= ' name="' . $this->name . '"';

            return $source;
        }

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    public function addClass($source)
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
    protected function addId($source)
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
    protected function addChildElements($source)
    {
        foreach ($this->_elements as $_element) {
            $source .= $_element;
        }

        return $source;
    }
}
