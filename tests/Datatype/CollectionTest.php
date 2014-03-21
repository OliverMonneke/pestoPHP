<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 21.03.2014
 * Time: 09:15
 */

namespace Datatype;

use Codersquad\Pestophp\Datatype\Collection;

class CollectionTest extends \PHPUnit_Framework_TestCase
{

    public function testIsValid()
    {
        $this->assertTrue(true, Collection::isValid([]));
    }
}
