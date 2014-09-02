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
    protected $path = 'resources/configuration';

    /**
     * Name of configuration file
     *
     * @var string
     */
    protected $file = NULL;

    /**
     * Save configuration file
     *
     * @todo implement code for saving
     *
     * @return bool
     */
    public function export()
    {
        return false;
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

    /**
     * Read config file
     *
     * @return void
     */
    private function import()
    {
        $environment = $this->determineEnvironment();

        $xmlFileName = BASE_PATH . DIRECTORY_SEPARATOR . '/' . $this->path . DIRECTORY_SEPARATOR . $environment . DIRECTORY_SEPARATOR . $this->file;

        $config = $this->importFile($xmlFileName);

        foreach ($config as $_key => $_value) {
            /** @noinspection PhpUndefinedMethodInspection */
            $this->set($_key, $_value->__toString());
        }
    }

    /**
     * @return string
     */
    private function determineEnvironment()
    {
        $environment = '';

        if (defined('ENVIRONMENT')) {
            $environment = ENVIRONMENT;
            return $environment;
        }

        return $environment;
    }

    /**
     * @param $xmlFileName
     * @return \SimpleXMLElement
     */
    private function importFile($xmlFileName)
    {
        $config = [];

        if (File::fileExists($xmlFileName)) {
            $config = simplexml_load_file($xmlFileName);

            return $config;
        }

        return $config;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
}
