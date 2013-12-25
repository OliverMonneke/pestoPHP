<?php

/**
 * Example for a controller
 */
namespace Codersquad\Module\Example\Controller;
use Codersquad\Mvc\Controller;

/**
 * Class ExampleController
 *
 * @package Codersquad\Module\Example\ExampleController
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class ExampleController extends Controller
{
    /**
     * Testing action
     *
     * @return mixed
     */
    public function testingAction()
    {
        return 'Test Action';
    }

}
