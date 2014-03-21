<?php

/**
 * Exception if directory does not exist
 */
namespace Codersqad\Pestophp\Exception;

/**
 * Class DirectoryNotFoundException
 *
 * @package Codersqad\Pestophp\Exception
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class DirectoryNotFoundException extends Exception
{
    /**
     * Error code
     *
     * @var int
     */
    protected $_errorCode = 4;
}
