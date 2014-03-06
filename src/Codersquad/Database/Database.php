<?php

/**
 * Database handling
 */
namespace codersquad\database;
use Codersquad\Classmanagement\ASingleton;

/**
 * Class Database
 *
 * @package Codersquad\Database
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Database extends ASingleton
{

    /**
     * Database type
     *
     * @var string
     */
    protected $_type = 'mysql';

    /**
     * Mysql result
     *
     * @var \mysqli_result
     */
    protected $_connection = NULL;

    /**
     * Get instance
     *
     * @return object
     */
    public static function getInstance()
    {
        $className = 'codersquad\database\\'.ucfirst(strtolower(DatabaseConfiguration::get('type')));
        $instance = $className::getInstance();
        $instance->connect();

        return $instance;
    }

    /**
     * Setter for type
     *
     * @param string $type Database type
     *
     * @return Database
     */
    public function setType($type)
    {
        $this->_type = $type;

        return $this;
    }

    /**
     * Getter for type
     *
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }
}
