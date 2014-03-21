<?php

/**
 * Exception if class does not exist
 */
namespace codersquad\pestophp\Exception;
use Codersquad\Exception\Exception;

/**
 * Exception ClassNotFound
 *
 * @package codersquad\pestophp\Exception
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
