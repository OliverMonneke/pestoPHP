<?php

/**
 * Import configuration for path options
 */
namespace Codersquad\Configuration;

/**
 * Class PathConfiguration
 *
 * @package Codersquad\Configuration
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class PathConfiguration extends AAppConfiguration
{

    /**
     * File name for path configuration
     *
     * @var string
     */
    protected $_file = 'path.xml';

    /**
     * Get instance
     *
     * @return PathConfiguration
     */
    public static function getInstance()
    {
        $instance = parent::getInstance();

        if (array_key_exists('REDIRECT_BASE', $_SERVER))
        {
            self::set('base', $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REDIRECT_BASE'] . DIRECTORY_SEPARATOR . '..');
        }

        return $instance;
    }
}
