<?php

/**
 * Exception if controller does not exist
 */
namespace Codersqad\Pestophp\Exception;

/**
 * Class ControllerNotFoundException
 *
 * @package Codersqad\Pestophp\Exception
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class ControllerNotFoundException extends Exception
{
    /**
     * Error code
     *
     * @var int
     */
    protected $_errorCode = 5;
}
