<?php

/**
 * Exception if controller does not exist
 */
namespace Codersquad\Pestophp\Exception;

/**
 * Class ControllerNotFoundException
 *
 * @package Codersquad\Pestophp\Exception
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
    protected $errorCode = 5;
}
