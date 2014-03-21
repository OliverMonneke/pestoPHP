<?php

/**
 * Exception if file does not exist
 */
namespace Codersquad\Pestophp\Exception;

/**
 * Class FileNotFoundException
 *
 * @package Codersquad\Pestophp\Exception
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class FileNotFoundException extends Exception
{

    /**
     * Error code
     *
     * @var int
     */
    protected $_errorCode = 2;
}
