<?php
/**
 * Created by PhpStorm.
 * User: Oliver
 * Date: 28.03.2014
 * Time: 22:45
 */

namespace Codersquad\Pestophp\Log;


/**
 * Class ILoggerAware
 * @package Codersquad\Pestophp\Log
 */
interface ILoggerAware
{
    /**
     * @param ILogger $logger
     */
    public function setLogger(ILogger $logger);
} 