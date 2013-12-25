<?php

/**
 * GET parameter handling
 */
namespace Codersquad\Request;

/**
 * Class Get
 *
 * @package Codersquad\Request
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Get extends ClipboardGet implements ICommand
{

    /**
     * Execute command
     *
     * @return void
     */
    public function execute()
    {
        foreach ($_GET as $_key => $_value)
        {
            self::set($_key, $_value);
        }
    }
}
