<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 29.03.2014
 * Time: 07:33
 */

namespace Codersquad\Pestophp\Tests\Mvc;


use Codersquad\Pestophp\Mvc\AModel;

/**
 * Class DummyModel
 * @package Codersquad\Pestophp\Tests\Mvc
 */
class DummyModel extends AModel
{
    const TABLE = 'user';
    const PRIMARY = 'id';
} 