<?php

/**
 * POST parameter handling
 */
namespace Codersquad\Pestophp\Request;

use Codersquad\Pestophp\Classmanagement\ICommand;
use Codersquad\Pestophp\Clipboard\ClipboardPost;

/**
 * Class Post
 *
 * @package Codersquad\Request
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Post extends ClipboardPost implements ICommand
{
    /**
     * Execute command
     *
     * @return void
     */
    public function execute()
    {
        foreach ($_POST as $_key => $_value)
        {
            self::set($_key, $_value);
        }
    }
}
