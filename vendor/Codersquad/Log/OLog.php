<?php

/**
 * Observer for logging
 */
namespace codersquad\log;
use Codersquad\Classmanagement\IObserver;

/**
 * Class OLog
 *
 * @package Codersquad\Log
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class OLog implements IObserver
{

    /**
     * Update observer
     *
     * @param IObserver $logger
     *
     * @return void
     */
    public function update(IObserver $logger)
    {
    }
}
