<?php

namespace Codersquad\Pestophp\Log;

/**
 * Class LoggerAwareInterface
 * @package Codersquad\Pestophp\Log
 */
interface LoggerAwareInterface
{
    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger);
}
