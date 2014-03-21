<?php

/**
 * MySQL database handling
 */
namespace Codersquad\Pestophp\Database\Types;
use Codersquad\Pestophp\Classmanagement\ASingleton;
use Codersquad\Pestophp\Configuration\DatabaseConfiguration;
use codersquad\pestophp\Database\IDatabase;

/**
 * Class Mysql
 *
 * @package Codersquad\Pestophp\Database\Types
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Mysql extends ASingleton implements IDatabase
{

    /**
     * Database connection
     *
     * @var \mysqli
     */
    private $_connection = NULL;

    /**
     * Database query
     *
     * @var string
     */
    private $_query = NULL;

    /**
     * Setter for query
     *
     * @param string $query Database query
     *
     * @return Mysql
     */
    public function setQuery($query)
    {
        $this->_query = $query;

        return $this;
    }

    /**
     * Getter for query
     *
     * @return string
     */
    public function getQuery()
    {
        return $this->_query;
    }

    /**
     * Connect to database
     *
     * @return void
     */
    public function connect()
    {
        if (NULL === $this->_connection)
        {
            $this->_connection = mysqli_connect(DatabaseConfiguration::get('host'), DatabaseConfiguration::get('user'), DatabaseConfiguration::get('password'), DatabaseConfiguration::get('database'), NULL, DatabaseConfiguration::get('socket'));
        }
    }

    /**
     * Execute database query
     *
     * @return bool|\mysqli_result
     */
    public function execute()
    {
        return mysqli_query($this->_connection, $this->getQuery());
    }
}
