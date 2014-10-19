<?php

/**
 * Interface for command implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class CommandInterface
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface CommandInterface
{

    /**
     * Do something
     *
     * @return void
     */
    public function execute();
}
