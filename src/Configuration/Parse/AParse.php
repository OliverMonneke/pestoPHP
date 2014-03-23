<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 22.03.2014
 * Time: 17:57
 */

namespace Codersquad\Pestophp\Configuration\Parse;


/**
 * Class AParse
 * @package Codersquad\Pestophp\Configuration\Parse
 */
abstract class AParse
{
    protected $source = null;
    protected $configurationArray = [];

    /**
     * @param $source
     */
    public function __construct($source)
    {

    }
}
