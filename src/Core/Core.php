<?php

/**
 * Core class for framework
 */
namespace Codersquad\Pestophp\Core;

use Codersquad\Pestophp\Classmanagement\ASingleton;
use Codersquad\Pestophp\Classmanagement\Command;
use Codersquad\Pestophp\Configuration\DatabaseConfiguration;
use Codersquad\Pestophp\Configuration\PathConfiguration;
use Codersquad\Pestophp\Mvc\Router;
use Codersquad\Pestophp\Request\Cookie;
use Codersquad\Pestophp\Request\Get;
use Codersquad\Pestophp\Request\Post;
use Codersquad\Pestophp\Request\Request;

require_once(__DIR__.'/../../vendor/autoload.php');

/**
 * Class Core
 *
 * @package codersquad\pestophp\Core
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Core extends ASingleton
{

    /**
     * Use MVC structure
     *
     * @var bool
     */
    private $_useMvc = TRUE;

    /**
     * Run all needed things
     *
     * @return void
     */
    public function run()
    {
        $this->_initConfiguration();
        $this->_initRequest();

        if ($this->_useMvc) {
            $this->_initRouter();
        }
    }

    /**
     * Initialize configuraiton
     *
     * @return void
     */
    private function _initConfiguration()
    {
        $configurationCommand = new Command();
        /** @noinspection PhpParamsInspection */
        $configurationCommand->add(DatabaseConfiguration::getInstance());
        $configurationCommand->add(PathConfiguration::getInstance());
        $configurationCommand->run();
    }

    /**
     * Initialize requests
     *
     * @return void
     */
    private function _initRequest()
    {
        $request = new Command();
        /** @noinspection PhpParamsInspection */
        $request->add(Get::getInstance());
        /** @noinspection PhpParamsInspection */
        $request->add(Post::getInstance());
        /** @noinspection PhpParamsInspection */
        $request->add(Cookie::getInstance());
        /** @noinspection PhpParamsInspection */
        $request->add(Request::getInstance());
        $request->run();
    }

    /**
     * Initialize router
     *
     * @return void
     */
    private function _initRouter()
    {
        $router = Router::getInstance();
        echo $router->init();
    }

    /**
     * Setter for useMvc
     *
     * @param boolean $useMvc Use MVC
     *
     * @return Core
     */
    public function setUseMvc($useMvc)
    {
        $this->_useMvc = $useMvc;

        return $this;
    }
}
