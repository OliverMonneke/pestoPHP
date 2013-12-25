<?php

/**
 * Router
 */
namespace Codersquad\Mvc;
use Codersquad\Classmanagement\ASingleton;
use Codersquad\Request\Request;
use Codersquad\Classmanagement\ClassHandler;

/**
 * Class Router
 *
 * @package Codersquad\Mvc
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Router extends ASingleton
{

    /**
     * Initializing router
     *
     * @return void
     */
    public function init()
    {
        $request = Request::getInstance();
        $controller = ucfirst(strtolower($request::get('controller')));
        $action = strtolower($request::get('action')) . 'Action';
        $controllerData = ClassHandler::loadController($controller, $action);

        $controller = new $controllerData['controller'];

        if (method_exists($controller, 'init'))
        {
            call_user_method('init', $controller);
        }

        echo call_user_method($controllerData['action'], $controller);
    }
}
