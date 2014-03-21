<?php

/**
 * Import configuration file for database configuration
 */
namespace codersquad\pestophp\Configuration;
use Codersquad\Configuration\AAppConfiguration;

/**
 * Class DatabaseConfiguration
 *
 * @package codersquad\pestophp\Configuration
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class DatabaseConfiguration extends AAppConfiguration
{

    /**
     * Configuration filename
     *
     * @var string
     */
    protected $_file = 'database.xml';
}
