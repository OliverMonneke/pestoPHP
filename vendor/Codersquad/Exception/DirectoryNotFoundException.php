<?php

/**
 * Exception if directory does not exist
 */
namespace Codersquad\Exception;
use Codersquad\Exception\Exception;

/**
 * Class DirectoryNotFoundException
 *
 * @package Codersquad\Exception
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
