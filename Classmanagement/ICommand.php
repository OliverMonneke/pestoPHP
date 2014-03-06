<?php

/**
 * Interface for command implementation
 */
namespace Codersquad\Classmanagement;

/**
 * Class ICommand
 *
 * @package Codersquad\Classmanagement
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
