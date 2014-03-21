<?php

/**
 * Abstract class for loading xml config files
 */
namespace Codersquad\Pestophp\Configuration;
use Codersquad\Pestophp\Classmanagement\ICommand;
use Codersquad\Pestophp\Clipboard\AClipboard;
use Codersquad\Pestophp\Filesystem\File;

/**
 * Class AAppConfiguration
 *
 * @package Codersquad\Pestophp\Configuration
 * @author Oliver Monneek <oliver@codersquad.de>
 * @version 0.1
 */
abstract class AAppConfiguration extends AClipboard implements IConfiguration, ICommand
{

    /**
     * Path for configuration file
     *
     * @var string
     */
    protected $_path = 'configuration';

    /**
     * Name of configuration file
     *
     * @var string
     */
    protected $_file = NULL;

    /**
     * Save configuration file
     *
     * @todo implement code for saving
     *
     * @return void
     */
    public function export()
    {
    }

    /**
     * Read config file
     *
     * @return void
     */
    public function import()
    {
        $environment = '';

        if (defined('ENVIRONMENT'))
        {
            $environment = ENVIRONMENT;
        }

        $xmlFileName = BASE_PATH . DIRECTORY_SEPARATOR . '/' . $this->_path . DIRECTORY_SEPARATOR . $environment . DIRECTORY_SEPARATOR . $this->_file;
        $config = [];

        if (File::fileExists($xmlFileName))
        {
            $config = simplexml_load_file($xmlFileName);
        }

        foreach ($config as $_key => $_value)
        {
            $this->set($_key, $_value->__toString());
        }
    }

    /**
     * Execute command
     *
     * @return void
     */
    public function execute()
    {
        $this->import();
    }
}
