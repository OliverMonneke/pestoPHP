<?php

/**
 * Observer for logging
 */
namespace codersquad\log;
use Codersquad\Pestophp\Classmanagement\IObserver;

/**
 * Class OLog
 *
 * @package Codersqad\Pestophp\Log
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class OLog implements IObserver
{

    /**
     * Update observer
     *
     * @param IObserver $logger The observer
     *
     * @return void
     */
    public function update(IObserver $logger)
    {
    }
}
