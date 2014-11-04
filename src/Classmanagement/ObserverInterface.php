<?php

/**
 * Interface for the observer implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class ObserverInterface
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface ObserverInterface
{

    /**
     * Update the observer
     *
     * @internal param \Codersquad\Pestophp\Classmanagement\ObserverInterface $observer The observer
     *
     * @return void
     */
    public function update();
}
