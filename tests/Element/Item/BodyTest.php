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
        $this->markTestSkipped('bash: line 1:  5044 Segmentation fault      (core dumped) env "JETBRAINS_REMOTE_RUN"="1" "IDE_PHPUNIT_CUSTOM_LOADER"="/vagrant/vendor/bin/phpunit" /usr/bin/php /home/vagrant/.phpstorm_helpers/phpunit.php --configuration /vagrant/phpunit.xml.dist');
        $body = new Body();
        $body->addClass('abc');
        $body->setCssId('abc');
        $this->assertEquals('<body class="abc" id="abc"></body>', $body->__toString());
    }
}
