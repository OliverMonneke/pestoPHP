<?php

/**
 * Abstract class for exceptions
 */
namespace Codersquad\Pestophp\Exception;

/**
 * Class Exception
 *
 * @package Codersquad\Pestophp\Exception
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class Exception extends \Exception
{

    /**
     * Error code
     *
     * @var int
     */
    protected $_errorCode = 0;

    /**
     * Mapping error code => error message
     *
     * @var array
     */
    private static $_errorCodes = [
        0 => 'Unknown error',
        1 => 'Class not found',
        2 => 'File not found',
        3 => 'Error code does not exist',
        4 => 'Directory not found',
        6 => 'Database not found',
        7 => 'Division by zero'
    ];

    /**
     * Default constructor
     *
     * @throws ErrorNotFoundException
     * @return \Codersquad\Pestophp\Exception\Exception
     */
    public function __construct()
    {
        if (!array_key_exists($this->_errorCode, self::$_errorCodes))
        {
            throw new ErrorNotFoundException;
        }

        $errorMessage = [];
        $errorMessage[] = 'Error '.$this->_errorCode.' occured: '.self::$_errorCodes[$this->_errorCode];

        $this->message = implode('<br />', $errorMessage);
    }
}
