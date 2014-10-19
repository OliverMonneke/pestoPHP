<?php

/**
 * Handling all REQUEST data
 */
namespace Codersquad\Pestophp\Request;

use Codersquad\Pestophp\Classmanagement\CommandInterface;
use Codersquad\Pestophp\Clipboard\ClipboardRequest;

/**
 * Class Request
 *
 * @package Codersquad\Pestophp\Request
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Request extends ClipboardRequest implements CommandInterface
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
