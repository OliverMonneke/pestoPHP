<?php

/**
 * Router
 */
namespace Codersquad\Pestophp\Mvc;
use Codersquad\Pestophp\Classmanagement\ASingleton;
use Codersquad\Pestophp\Classmanagement\ClassHandler;
use Codersquad\Pestophp\Datatype\String;
use Codersquad\Pestophp\Request\Request;

/**
 * Class Router
 *
 * @package Codersquad\Pestophp\Mvc
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Router extends ASingleton
{
    /**
     * Initializing router
     *
     * @return mixed
     */
    public function init()
    {
        $controller = String::upperFirst(strtolower(Request::get('controller')));
        $action = String::lower(Request::get('action')) . 'Action';
        $controllerData = ClassHandler::loadController($controller, $action);

        $controller = new $controllerData['controller'];

        if (method_exists($controller, 'init'))
        {
            call_user_method('init', $controller);
        }

        return call_user_method($controllerData['action'], $controller);
    }
}
