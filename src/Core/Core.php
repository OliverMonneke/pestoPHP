<?php

/**
 * Core class for framework
 */
namespace Codersquad\Pestophp\Core;

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
     * Use GUI system
     *
     * @var bool
     */
    private $_useGui = FALSE;

    /**
     * Run all needed things
     *
     * @return void
     */
    public function run()
    {
        $this->_initConfiguration();
        $this->_initRequest();

        if ($this->_useMvc)
        {
            $this->_initRouter();
        }

        if ($this->_useGui)
        {
            $this->_initGui();
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
        $router->init();
    }

    /**
     * Initialize GUI system
     *
     * @return void
     */
    private function _initGui()
    {
        $gui = Gui::getInstance();
        Gui::$view = Request::get('view');
        $gui->run();
        echo $gui;
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

    /**
     * Setter for useGui
     *
     * @param boolean $useGui Use GUI system
     *
     * @return Core
     */
    public function setUseGui($useGui)
    {
        $this->_useGui = $useGui;

        return $this;
    }
}
