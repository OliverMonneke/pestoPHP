<?php

/**
 * Interface for iterators
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class IIterator
 *
 * @package Codersquad\Pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface IIterator
{

    /**
     * Setter for data collection
     *
     * @return void
     */
    public function setArray();

    /**
     * Getter for data collection
     *
     * @return array
     */
    public function getArray();
}
