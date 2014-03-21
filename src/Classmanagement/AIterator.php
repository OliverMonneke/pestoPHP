<?php

/**
 * Abstract class for iterator implementation
 */
namespace Codersquad\Pestophp\Classmanagement;

/**
 * Class AIterator
 *
 * @package codersquad\pestophp\Classmanagement
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class AIterator implements \Iterator
{

    /**
     * Actual position
     *
     * @var int
     */
    private $_position = 0;

    /**
     * Daa collection
     *
     * @var array
     */
    protected $_array = [];

    /**
     * Default constructor
     *
     * @return \Codersquad\Pestophp\Classmanagement\AIterator
     */
    public function __construct()
    {
        $this->_position = 0;
    }

    /**
     * Current element
     *
     * @return mixed
     */
    public function current()
    {
        return $this->_array[$this->_position];
    }

    /**
     * The key
     *
     * @return int
     */
    public function key()
    {
        return $this->_position;
    }

    /**
     * Next position
     *
     * @return int
     */
    public function next()
    {
        return ++$this->_position;
    }

    /**
     * Rewind data collection
     *
     * @return void
     */
    public function rewind()
    {
        $this->_position = 0;
    }

    /**
     * Check if element exists
     *
     * @return bool
     */
    public function valid()
    {
        return isset($this->_array[$this->_position]);
    }
}
