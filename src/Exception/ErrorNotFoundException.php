<?php

/**
 * Exception if error code does not exist
 */
namespace Codersquad\Pestophp\Exception;

/**
 * Class ErrorNotFoundException
 *
 * @package Codersquad\Pestophp\Exception
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
    protected $errorCode = 3;
}
