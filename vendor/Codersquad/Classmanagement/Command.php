<?php

/**
 * Class for command implementation
 */
namespace Codersquad\Classmanagement;

/**
 * Command class
 *
 * @package Codersquad\Classmanagement
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
     * @param \codersquad\classmanagement\ICommand $command The command
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
        foreach ($this->_commands as $_command)
        {
            $_command->execute();
        }
    }
}
