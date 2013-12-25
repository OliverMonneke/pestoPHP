<?php

/**
 * POST parameter handling
 */
namespace Codersquad\Request;
use Codersquad\Clipboard\ClipboardPost;
use Codersquad\Classmanagement\ICommand;

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
