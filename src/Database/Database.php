<?php

/**
 * Database handling
 */
namespace Codersquad\Pestophp\Database;
use Codersquad\Pestophp\Classmanagement\ASingleton;
use Codersquad\Pestophp\Configuration\DatabaseConfiguration;

/**
 * Class Database
 *
 * @package Codersquad\Pestophp\Database
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
        /** @var $className Database */
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
