<?php

/**
 * Pure text
 */
namespace Codersquad\Pestophp\Element\Item;

use Codersquad\Pestophp\Element\AItem;

/**
 * Class Label
 *
 * @package Codersquad\Pestophp\Element\Item
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Label extends AItem
{
    /**
     * @var string
     */
    protected $tag = '';

    /**
     * Render element
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
