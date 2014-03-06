<?php

/**
 * Interface for logging
 */
namespace Codersquad\Log;

/**
 * Interface ILog
 *
 * @package Codersquad\Log
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
