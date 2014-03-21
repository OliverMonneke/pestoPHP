<?php

/**
 * Exception if database does not exist
 */
namespace Codersqad\Pestophp\Exception;

/**
 * Class DatabaseNotFoundException
 *
 * @package Codersqad\Pestophp\Exception
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
    protected $_errorCode = 6;
}
