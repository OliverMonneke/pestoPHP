<?php

/**
 * Interface for all configurations
 */
namespace Codersquad\Pestophp\Configuration;

/**
 * Class IConfiguration
 *
 * @package Codersquad\Pestophp\Configuration
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface IConfiguration
{

    /**
     * Import configuration
     *
     * @return void
     */
    public function execute();

    /**
     * Export configuration
     *
     * @return void
     */
    public function export();
}
