<?php

/**
 * Exception if class does not exist
 */
namespace Codersquad\Exception;

/**
 * Exception ClassNotFound
 *
 * @package Codersquad\Exception
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class ClassNotFoundException extends Exception
{

    /**
     * Error code
     *
     * @var int
     */
    protected $_errorCode = 1;
}
