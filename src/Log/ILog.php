<?php

/**
 * Interface for logging
 */
namespace Codersqad\Pestophp\Log;

/**
 * Interface ILog
 *
 * @package Codersqad\Pestophp\Log
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface ILog
{

    /**
     * Write logging details
     *
     * @param string $string String to log
     *
     * @return void
     */
    public function write($string);
}
