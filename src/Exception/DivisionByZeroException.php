<?php

/**
 * Exception if division by zero
 */
namespace Codersquad\Pestophp\Exception;

/**
 * Exception DivisionByZero
 *
 * @package Codersquad\Pestophp\Exception
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class DivisionByZero extends Exception
{

    /**
     * Error code
     *
     * @var int
     */
    protected $_errorCode = 7;
}
