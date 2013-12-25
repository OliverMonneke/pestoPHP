<?php

/**
 * Exception if controller does not exist
 */
namespace Codersquad\Exception;
use Codersquad\Exception\Exception;

/**
 * Class ControllerNotFoundException
 *
 * @package Codersquad\Exception
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
