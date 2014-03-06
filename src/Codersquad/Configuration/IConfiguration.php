<?php

/**
 * Interface for all configurations
 */
namespace Codersquad\Configuration;

/**
 * Class IConfiguration
 *
 * @package Codersquad\Configuration
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
    public function import();

    /**
     * Export configuration
     *
     * @return void
     */
    public function export();
}
