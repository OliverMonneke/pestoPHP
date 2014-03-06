<?php

/**
 * Interface for iterators
 */
namespace Codersquad\Classmanagement;

/**
 * Class IIterator
 *
 * @package Codersquad\Classmanagement
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
