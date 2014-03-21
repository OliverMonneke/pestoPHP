<?php

/**
 * Interface for command implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class ICommand
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface ICommand
{

    /**
     * Do something
     *
     * @return void
     */
    public function execute();
}
