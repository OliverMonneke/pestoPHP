<?php

require_once(__DIR__.'/../../vendor/autoload.php');

/**
 * Core class for framework
 */
namespace Codersquad\Pestophp\Core;

use Codersquad\Pestophp\Classmanagement\Command;
use Codersquad\Pestophp\Classmanagement\TSingleton;
use Codersquad\Pestophp\Configuration\DatabaseConfiguration;
use Codersquad\Pestophp\Configuration\PathConfiguration;
use Codersquad\Pestophp\Mvc\Router;
use Codersquad\Pestophp\Request\Cookie;
use Codersquad\Pestophp\Request\Get;
use Codersquad\Pestophp\Request\Post;
use Codersquad\Pestophp\Request\Request;

/**
 * Class Core
 *
 * @package codersquad\pestophp\Core
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Core
{
    use TSingleton;

    /**
     * Use MVC structure
     *
     * @var bool
     */
    private $useMvc = true;

    /**
     * Run all needed things
     *
     * @return bool
     */
    public function run()
    {
        $this->initConfiguration();
        $this->initRequest();

        if ($this->useMvc) {
            return $this->initRouter();
        }

        return true;
    }

    /**
     * Initialize configuraiton
     *
     * @return void
     */
    private function initConfiguration()
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
    private function initRequest()
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
     * @return bool
     */
    private function initRouter()
    {
        $router = Router::getInstance();
        echo $router->init();

        return true;
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
        $this->useMvc = $useMvc;

        return $this;
    }
}
