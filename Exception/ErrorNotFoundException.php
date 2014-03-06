<?php

/**
 * Exception if error code does not exist
 */
namespace Codersquad\Exception;
use Codersquad\Exception\Exception;

/**
 * Class ErrorNotFoundException
 *
 * @package Codersquad\Exception
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
