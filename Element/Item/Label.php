<?php

/**
 * Pure text
 */
namespace Codersquad\Element\Item;
use Codersquad\Element\AItem;

/**
 * Class Label
 *
 * @package Codersquad\Element\Item
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Label extends AItem
{
    /**
     * @var string
     */
    protected $_tag = '';

    /**
     * Render element
     *
     * @return string
     */
    public function __toString()
    {
        return $this->_value;
    }
}