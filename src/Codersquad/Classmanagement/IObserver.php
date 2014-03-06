<?php

/**
 * Interface for the observer implementation
 */
namespace Codersquad\Classmanagement;

/**
 * Class IObserver
 *
 * @package Codersquad\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface IObserver
{

    /**
     * Update the observer
     *
     * @param IObserver $observer The observer
     *
     * @return void
     */
    public function update(IObserver $observer);
}
