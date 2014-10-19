<?php

/**
 * Interface for database classes
 */
namespace Codersquad\Pestophp\Database;

/**
 * Interface DatabaseInterface
 *
 * @package Codersquad\Pestophp\Database
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface DatabaseInterface
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

    /**
     * Get loaded Records
     *
     * @return mixed
     */
    public function fetch();
}
