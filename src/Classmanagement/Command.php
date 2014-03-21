<?php

/**
 * Class for command implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Command class
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Command
{

    /**
     * Command collection
     *
     * @var array
     */
    private $_commands = [];

    /**
     * Add command
     *
     * @param ICommand $command The command
     *
     * @return void
     */
    public function add(ICommand $command)
    {
        $this->_commands[] = $command;
    }

    /**
     * Run command
     *
     * @return void
     */
    public function run()
    {
        /** @var $_command ICommand */
        foreach ($this->_commands as $_command)
        {
            $_command->execute();
        }
    }
}
