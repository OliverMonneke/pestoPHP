<?php

/**
 * Exception if database does not exist
 */
namespace Codersquad\Pestophp\Exception;

/**
 * Class DatabaseNotFoundException
 *
 * @package Codersquad\Pestophp\Exception
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class DatabaseNotFoundException extends Exception
{
    /**
     * Error code
     *
     * @var int
     */
    protected $errorCode = 6;
}
