<?php

/**
 * Core class for framework
 */
namespace Codersquad\Core;

/**
 * Class Core
 *
 * @package Codersquad\Core
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Core extends ASingleton
{

    /**
     * Run all needed things
     *
     * @return void
     */
    public function run()
    {
        $this->_initConfiguration();
        $this->_initRequest();
        $this->_initRouter();
    }

    /**
     * Initialize configuraiton
     *
     * @return void
     */
    private function _initConfiguration()
    {
        $configurationCommand = new Command();
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
        $request->add(Get::getInstance());
        $request->add(Post::getInstance());
        $request->add(Cookie::getInstance());
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
        $router->init();
    }
}
