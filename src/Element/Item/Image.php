<?php

/**
 * IMG tag
 */
namespace codersquad\pestophp\Element\Item;
use Codersquad\Element\AContainer;

/**
 * Class Image
 *
 * @package codersquad\pestophp\Element\Item
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Image extends AContainer
{
    /**
     * @var string
     */
    protected $_tag = 'img';

    /**
     * @var string
     */
    protected $_dataTag = 'src';
} 