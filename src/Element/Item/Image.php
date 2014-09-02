<?php

/**
 * IMG tag
 */
namespace Codersquad\Pestophp\Element\Item;

use Codersquad\Pestophp\Element\AContainer;

/**
 * Class Image
 *
 * @package Codersquad\Pestophp\Element\Item
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Image extends AContainer
{
    /**
     * @var string
     */
    protected $tag = 'img';

    /**
     * @var string
     */
    protected $dataTag = 'src';
}
