<?php

/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 06.03.14
 * Time: 20:33
 */

namespace codersqad\pestophp\Tests;

use codersquad\pestophp\Datatype\Collection;
use PHPUnit_Framework_TestCase;

class CollectionTest extends PHPUnit_Framework_TestCase
{

    public function testIsValid()
    {
        $this->assertTrue(Collection::isValid([]));
    }
}
