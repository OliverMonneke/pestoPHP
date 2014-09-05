<?php

/**
 * Handling all REQUEST data
 */
namespace Codersquad\Pestophp\Request;

use Codersquad\Pestophp\Classmanagement\ICommand;
use Codersquad\Pestophp\Clipboard\ClipboardRequest;

/**
 * Class Request
 *
 * @package Codersquad\Pestophp\Request
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
        foreach ($_REQUEST as $_key => $_value) {
            self::set($_key, $_value);
        }
    }
}
