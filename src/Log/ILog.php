<?php

/**
 * Interface for logging
 */
namespace Codersquad\Pestophp\Log;

/**
 * Interface ILog
 *
 * @package Codersquad\Pestophp\Log
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
