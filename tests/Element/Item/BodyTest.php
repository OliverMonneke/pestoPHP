<?php

namespace Codersquad\Pestophp\Tests\Element\Item;

use Codersquad\Pestophp\Element\Item\Body;
use PHPUnit_Framework_TestCase;

/**
 * Class BodyTest
 * @package Codersquad\Pestophp\Tests\Element\Item
 */
class BodyTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testToString()
    {
        $body = new Body();
        $this->assertEquals('<body></body>', $body->__toString());
    }

    /**
     *
     */
    public function testWithAllParams()
    {
        $body = new Body();
        $body->addClass('abc');
        $body->setCssId('abc');
        $this->assertEquals('<body class="abc" id="abc"></body>', $body->__toString());
    }
}
