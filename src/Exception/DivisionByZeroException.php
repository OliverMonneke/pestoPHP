<?php

/**
 * Exception if division by zero
 */
namespace Codersquad\Exception;
use Codersquad\Exception\Exception;

/**
 * Exception DivisionByZero
 *
 * @package Codersquad\Exception
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
