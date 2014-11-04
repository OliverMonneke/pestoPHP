<?php

/**
 * Interface for all configurations
 */
namespace Codersquad\Pestophp\Configuration;

/**
 * Class ConfigurationInterface
 *
 * @package Codersquad\Pestophp\Configuration
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface ConfigurationInterface
{

    /**
     * Import configuration
     *
     * @return void
     */
    public function execute();
}
