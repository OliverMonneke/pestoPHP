<?php

/**
 * a tag
 */
namespace Codersquad\Pestophp\Element\Component;
use Codersquad\Pestophp\Datatype\String;
use Codersquad\Pestophp\Element\AContainer;

/**
 * Class Link
 *
 * @package Codersquad\Pestophp\Element\Component
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
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
     * Getter for href
     *
     * @return string
     */
    public function getHref()
    {
        return $this->_href;
    }

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
     * Render container
     *
     * @return string
     */
    public function __toString()
    {
        $source = '<' . $this->_tag;
        $source .= ' ' . $this->_dataTag . '="' . $this->_href . '"';

        $source = $this->_addTarget($source);

        $source = $this->_addClass($source);

        $source = $this->_addId($source);

        $source .= '>' . $this->_value;

        $source = $this->_addChildElements($source);

        $source .= '</' . $this->_tag . '>';

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    private function _addTarget($source)
    {
        if (String::isNotEmpty($this->getTarget())) {
            $source .= ' target="' . $this->_target . '"';
            return $source;
        }
        return $source;
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
}