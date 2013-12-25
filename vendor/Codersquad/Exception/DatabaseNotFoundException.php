<?php

/**
 * Exception if database does not exist
 */
namespace Codersquad\Exception;

/**
 * Class DatabaseNotFoundException
 *
 * @package Codersquad\Exception
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
