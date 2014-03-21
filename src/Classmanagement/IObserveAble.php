<?php

/**
 * Interface for observer implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class IObserveAble
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface IObserveAble
{

    /**
     * Attach observer
     *
     * @param IObserver $observer The observer
     *
     * @return void
     */
    public function attach(IObserver $observer);

    /**
     * Remove observer
     *
     * @param IObserver $observer The observer
     *
     * @return void
     */
    public function detach(IObserver $observer);

    /**
     * Notify observers
     *
     * @return void
     */
    public function notify();
}
