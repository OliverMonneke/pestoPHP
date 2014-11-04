<?php

/**
 * Interface for observer implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class ObserveAbleInterface
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface ObserveAbleInterface
{

    /**
     * Attach observer
     *
     * @param ObserverInterface $observer The observer
     *
     * @return void
     */
    public function attach(ObserverInterface $observer);

    /**
     * Remove observer
     *
     * @param ObserverInterface $observer The observer
     *
     * @return void
     */
    public function detach(ObserverInterface $observer);

    /**
     * Notify observers
     *
     * @return void
     */
    public function notify();
}
