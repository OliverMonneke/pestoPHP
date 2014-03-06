<?php

/**
 * Cookie handling
 */
namespace Codersquad\Request;
use Codersquad\Clipboard\ClipboardCookie;
use Codersquad\Classmanagement\ICommand;

/**
 * Class Cookie
 *
 * @package Codersquad\Request
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Cookie extends ClipboardCookie implements ICommand
{

    /**
     * Execute command
     *
     * @return void
     */
    public function execute()
    {
        foreach ($_COOKIE as $_key => $_value)
        {
            self::set($_key, $_value);
        }
    }
}
