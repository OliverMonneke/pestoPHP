<?php

/**
 * Pure text
 */
namespace Codersqad\Pestophp\Element\Item;
use Codersqad\Pestophp\Element\AItem;

/**
 * Class Label
 *
 * @package Codersqad\Pestophp\Element\Item
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