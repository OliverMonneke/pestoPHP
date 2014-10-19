<?php

/**
 * GET parameter handling
 */
namespace Codersquad\Pestophp\Request;

use Codersquad\Pestophp\Classmanagement\CommandInterface;
use Codersquad\Pestophp\Clipboard\ClipboardGet;

/**
 * Class Get
 *
 * @package Codersquad\Request
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Get extends ClipboardGet implements CommandInterface
{
    /**
     * Execute command
     *
     * @return void
     */
    public function execute()
    {
        foreach ($_GET as $_key => $_value) {
            self::set($_key, $_value);
        }
    }
}
