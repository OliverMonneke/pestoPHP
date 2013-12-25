<?php

/**
 * Handling all REQUEST data
 */
namespace Codersquad\Request;

/**
 * Class Request
 *
 * @package Codersquad\Request
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Request extends ClipboardRequest implements ICommand
{

    /**
     * Execute command
     *
     * @return void
     */
    public function execute()
    {
        foreach ($_REQUEST as $_key => $_value)
        {
            self::set($_key, $_value);
        }
    }
}
