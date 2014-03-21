<?php

/**
 * Interface for database classes
 */
namespace codersquad\pestophp\Database;

/**
 * Interface IDatabase
 *
 * @package codersquad\pestophp\Database
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface IDatabase
{
    /**
     * Connect to database
     *
     * @return mixed
     */
    public function connect();

    /**
     * Execute the query
     *
     * @return mixed
     */
    public function execute();

    /**
     * Setter for query
     *
     * @param string $query Database query
     *
     * @return mixed
     */
    public function setQuery($query);

    /**
     * Getter for query
     *
     * @return mixed
     */
    public function getQuery();
}
