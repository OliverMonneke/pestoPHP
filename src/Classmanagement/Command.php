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
    private $commands = [];

    /**
     * Add command
     *
     * @param CommandInterface $command The command
     *
     * @return void
     */
    public function add(CommandInterface $command)
    {
        $this->commands[] = $command;
    }

    /**
     * Run command
     *
     * @return void
     */
    public function run()
    {
        /** @var $_command CommandInterface */
        foreach ($this->commands as $_command) {
            $_command->execute();
        }
    }
}
