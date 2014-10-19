<?php

/**
 * Import configuration for path options
 */
namespace Codersquad\Pestophp\Configuration;

/**
 * Class PathConfiguration
 *
 * @package Codersquad\Pestophp\Configuration
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class PathConfiguration extends AAppConfigurationInterface
{

    /**
     * File name for path configuration
     *
     * @var string
     */
    protected $file = 'path.xml';

    /**
     * Get instance
     *
     * @return PathConfiguration
     */
    public static function getInstance()
    {
        $instance = parent::getInstance();
        self::setRedirectBase();

        return $instance;
    }

    /**
     *
     */
    private static function setRedirectBase()
    {
        if (array_key_exists('REDIRECT_BASE', $_SERVER)) {
            self::set('base', $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REDIRECT_BASE'] . DIRECTORY_SEPARATOR . '..');
        }
    }
}
