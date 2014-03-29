<?php

/**
 * MySQL database handling
 */
namespace Codersquad\Pestophp\Database\Types;

use Codersquad\Pestophp\Classmanagement\TSingleton;
use Codersquad\Pestophp\Configuration\DatabaseConfiguration;
use Codersquad\Pestophp\Database\IDatabase;

/**
 * Class Mysql
 *
 * @package Codersquad\Pestophp\Database\Types
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Mysql implements IDatabase
{
    use TSingleton;
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
     * Connect to database
     *
     * @return Mysql
     */
    public function connect()
    {
        if (NULL === $this->_connection) {
            $this->_connection = mysqli_connect(DatabaseConfiguration::get('host'), DatabaseConfiguration::get('user'), DatabaseConfiguration::get('password'), DatabaseConfiguration::get('database'), NULL, DatabaseConfiguration::get('socket'));
        }
    }

    /**
     * Get loaded Records
     *
     * @return mixed
     */
    public function fetch()
    {
        $returnArray = [];
        $result = $this->execute();

        /** @noinspection PhpAssignmentInConditionInspection */
        while ($row = mysqli_fetch_assoc($result)) {
            $returnArray[] = $row;
        }

        return $returnArray;
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
}
