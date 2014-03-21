<?php

/**
 * Exception if division by zero
 */
namespace Codersqad\Pestophp\Exception;

/**
 * Exception DivisionByZero
 *
 * @package Codersqad\Pestophp\Exception
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
