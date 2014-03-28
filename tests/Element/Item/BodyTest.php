<?php
use Codersquad\Pestophp\Element\Item\Body;

/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 28.03.2014
 * Time: 21:41
 */

class BodyTest extends PHPUnit_Framework_TestCase
{

    public function testToString()
    {
        $body = new Body();
        $this->assertEquals('<body></body>', $body->__toString());
    }

    public function testWithAllParams()
    {
        $body = new Body();
        $body->addClass('abc');
        $body->setId('abc');
        $this->assertEquals('<body class="abc" id="abc"></body>', $body->__toString());
    }
}
