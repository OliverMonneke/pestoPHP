<?php

/**
 * Abstract base class for items
 */
namespace Codersquad\Pestophp\Element;

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
    abstract public function __toString();
}
