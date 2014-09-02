<?php

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