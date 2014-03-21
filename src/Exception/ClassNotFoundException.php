<?php

/**
 * Exception if class does not exist
 */
namespace Codersqad\Pestophp\Exception;

/**
 * Exception ClassNotFound
 *
 * @package Codersqad\Pestophp\Exception
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
