<?php

namespace Codersquad\Pestophp\Tests\Element\Component;

use Codersquad\Pestophp\Element\Component\Link;
use Codersquad\Pestophp\Element\Item\Label;
use PHPUnit_Framework_TestCase;

/**
 * Class LinkTest
 * @package Element\Component
 */
class LinkTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testSetHref()
    {
        $link = new Link();
        $link->setHref('abc');
        $this->assertEquals('abc', $link->getHref());
    }

    /**
     *
     */
    public function testSetTarget()
    {
        $link = new Link();
        $link->setTarget('abc');
        $this->assertEquals('abc', $link->getTarget());
    }

    /**
     *
     */
    public function testToString()
    {
        $link = new Link();
        $this->assertEquals('<a href=""></a>', $link->__toString());
    }

    /**
     *
     */
    public function testToStringWithTarget()
    {
        $link = new Link();
        $link->setTarget('abc');
        $this->assertEquals('<a href="" target="abc"></a>', $link->__toString());
    }

    /**
     *
     */
    public function testToStringWithClass()
    {
        $link = new Link();
        $link->addClass('abc');
        $this->assertEquals('<a href="" class="abc"></a>', $link->__toString());
    }

    /**
     *
     */
    public function testToStringWithId()
    {
        $link = new Link();
        $link->setId('abc');
        $this->assertEquals('<a href="" id="abc"></a>', $link->__toString());
    }

    /**
     *
     */
    public function testToStringWithChildElement()
    {
        $link = new Link();
        $label = new Label();
        $label->setValue('abc');
        $link->addElement($label);
        $this->assertEquals('<a href="">abc</a>', $link->__toString());
    }
}
