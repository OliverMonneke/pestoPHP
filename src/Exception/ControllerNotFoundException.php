<?php

/**
 * Exception if controller does not exist
 */
namespace codersquad\pestophp\Exception;
use Codersquad\Exception\Exception;

/**
 * Class ControllerNotFoundException
 *
 * @package codersquad\pestophp\Exception
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
