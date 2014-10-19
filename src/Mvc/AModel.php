<?php

/**
 * Abstract class for model generating
 */
namespace Codersquad\Pestophp\Mvc;

use Codersquad\Pestophp\Database\Database;
use Codersquad\Pennephp\Datatype\Collection;
use Codersquad\Pennephp\Datatype\String;

/**
 * Class Model
 *
 * @package Codersquad\Pestophp\Mvc
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class AModel
{
    /**
     * Database object
     *
     * @var Database
     */
    protected $databaseObject = null;

    /**
     * Data collection
     *
     * @var array
     */
    private $dataCollection = [];

    /**
     * Value of primary key
     *
     * @var int|string
     */
    private $primaryValue = null;

    /**
     * Name of model
     *
     * @var object
     */
    private $model = null;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->databaseObject = Database::getInstance();
        $this->model = get_called_class();
    }

    /**
     * Magic methods for getter and setter
     *
     * @param string $method The method to call
     * @param array $arguments The arguments to call
     *
     * @return mixed|bool
     */
    public function __call($method, $arguments)
    {
        $returnValue = '';

        $magicMethod = $this->evaluateMagicMethod($method);

        switch ($magicMethod) {
            case 'set':
                $this->set(String::lowerFirst(String::substring($method, 3)), $arguments[0]);
                $returnValue = $this->model;
                break;
            case 'get':
                $returnValue = $this->get(String::lowerFirst(substr($method, 3)));
                break;
        }

        return $returnValue;
    }

    /**
     * @param $method
     * @return string
     */
    private function evaluateMagicMethod($method)
    {
        return String::substring($method, 0, 3);
    }

    /**
     * Setter
     *
     * @param mixed $key The key
     * @param mixed $value The value
     *
     * @return AModel
     */
    public function set($key, $value)
    {
        $this->$key = $value;

        return $this;
    }

    /**
     * Getter
     *
     * @param mixed $key The key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->$key;
    }

    /**
     * Load one or more data sets
     *
     * @param int|string $primaryValue The value for the primary key
     *
     * @return void
     */
    public function load($primaryValue = null)
    {
        $model = $this->model;
        $query = [];
        $query[] = 'SELECT * FROM ' . $model::TABLE;

        $query = $this->loadWithPrimaryKey($primaryValue, $model, $query);

        $dataCollection = $this->databaseObject->getInstance()->setQuery(Collection::implode($query, ''))->fetch();

        if (Collection::length($dataCollection) === 1 ||
            $primaryValue === null
        ) {
            $this->loadSingleEntry($dataCollection, $model);
        } elseif (Collection::length($dataCollection) > 2) {
            $this->setProperties($dataCollection[0], $this);
        }
    }

    /**
     * @param $primaryValue
     * @param $model
     * @param $query
     * @return array
     */
    private function loadWithPrimaryKey($primaryValue, $model, $query)
    {
        if (null !== $primaryValue) {
            $this->primaryValue = $primaryValue;
            $query[] = ' WHERE ' . $model::PRIMARY . ' = ' . $this->primaryValue;

            return $query;
        }

        return $query;
    }

    /**
     * @param $dataCollection
     * @param $model
     */
    private function loadSingleEntry($dataCollection, $model)
    {
        foreach ($dataCollection as $_data) {
            $model = $this->setProperties($_data, new $model());
            $this->dataCollection[] = $model;
        }
    }

    /**
     * Set class property
     *
     * @param array $data The data
     * @param $object Object to set the property in
     *
     * @return object
     */
    private function setProperties($data, $object)
    {
        foreach ($data as $_key => $_value) {
            $object->set($_key, $_value);
        }

        return $object;
    }

    /**
     * Remove primary value for copying
     *
     * @return void
     */
    public function __clone()
    {
        $this->primaryValue = null;
    }
}
