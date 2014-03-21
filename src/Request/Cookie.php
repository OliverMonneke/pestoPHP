<?php

/**
 * Cookie handling
 */
namespace Codersquad\Pestophp\Request;
use Codersquad\Pestophp\Classmanagement\ICommand;
use Codersquad\Pestophp\Clipboard\ClipboardCookie;

/**
 * Class Cookie
 *
 * @package Codersquad\Pestophp\Request
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
