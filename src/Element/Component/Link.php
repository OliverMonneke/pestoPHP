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
    protected $tag = 'a';

    /**
     * @var string
     */
    protected $dataTag = 'href';

    /**
     * @var string
     */
    protected $href = '';

    /**
     * @var string
     */
    protected $target = NULL;

    /**
     * Getter for href
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
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
        $this->href = $href;

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
        $source .= ' ' . $this->dataTag . '="' . $this->href . '"';

        $source = $this->addTarget($source);

        $source = $this->addClass($source);

        $source = $this->addId($source);

        $source .= '>' . $this->value;

        $source = $this->addChildElements($source);

        $source .= '</' . $this->tag . '>';

        return $source;
    }

    /**
     * @param $source
     * @return string
     */
    private function addTarget($source)
    {
        if (String::isNotEmpty($this->getTarget())) {
            $source .= ' target="' . $this->target . '"';

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
        return $this->target;
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
        $this->target = $target;

        return $this;
    }
}
