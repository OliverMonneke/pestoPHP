<?php

/**
 * Exception if error code does not exist
 */
namespace Codersqad\Pestophp\Exception;

/**
 * Class ErrorNotFoundException
 *
 * @package Codersqad\Pestophp\Exception
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class ErrorNotFoundException extends Exception
{
    /**
     * Error code
     *
     * @var int
     */
    protected $_errorCode = 3;
}
