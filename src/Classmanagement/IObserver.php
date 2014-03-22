<?php

/**
 * Interface for the observer implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class IObserver
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface IObserver
{

    /**
     * Update the observer
     *
     * @internal param \Codersquad\Pestophp\Classmanagement\IObserver $observer The observer
     *
     * @return void
     */
    public function update();
}
