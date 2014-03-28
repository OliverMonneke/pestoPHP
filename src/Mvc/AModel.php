<?php

/**
 * Abstract class for model generating
 */
namespace Codersquad\Pestophp\Mvc;
use Codersquad\Pestophp\Database\Database;
use Codersquad\Pestophp\Datatype\Collection;
use Codersquad\Pestophp\Datatype\String;

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
    protected $_databaseObject = NULL;

    /**
     * Data collection
     *
     * @var array
     */
    private $_dataCollection = [];

    /**
     * Value of primary key
     *
     * @var int|string
     */
    private $_primaryValue = NULL;

    /**
     * Name of model
     *
     * @var object
     */
    private $_model = NULL;

    /**
     * Magic methods for getter and setter
     *
     * @param string $method    The method to call
     * @param array  $arguments The arguments to call
     *
     * @return mixed|bool
     */
    public function __call($method, $arguments)
    {
        $returnValue = '';

        $magicMethod = $this->_evaluateMagicMethod($method);

        switch($magicMethod)
        {
            case 'set':
                $this->set(String::lowerFirst(String::substring($method, 3)), $arguments[0]);
                $returnValue = $this->_model;
                break;
            case 'get':
                $returnValue = $this->get(String::lowerFirst(substr($method, 3)));
                break;
        }

        return $returnValue;
    }

    /**
     * Setter
     *
     * @param mixed $key   The key
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
    public function load($primaryValue = NULL)
    {
        $model = $this->_model;
        $query = [];
        $query[] = 'SELECT * FROM '.$model::TABLE;

        $query = $this->_loadWithPrimaryKey($primaryValue, $model, $query);

        $dataCollection = $this->_databaseObject->getInstance()->setQuery(Collection::implode($query, ''))->execute()->fetch();

        if (Collection::length($dataCollection) > 1 ||
                $primaryValue === NULL)
        {
            $this->_loadSingleEntry($dataCollection, $model);
        }
        elseif (Collection::length($dataCollection) > 2)
        {
            $this->_setProperties($dataCollection[0], $this);
        }
    }

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->_databaseObject = Database::getInstance();
        $this->_model = get_called_class();
    }

    /**
     * Set class property
     *
     * @param array  $data   The data
     * @param object $object Object to set the property in
     *
     * @return object
     */
    private function _setProperties($data, $object)
    {
        foreach ($data as $_key => $_value)
        {
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
        $this->_primaryValue = NULL;
    }

    /**
     * @param $method
     * @return string
     */
    private function _evaluateMagicMethod($method)
    {
        return String::substring($method, 0, 3);
    }

    /**
     * @param $primaryValue
     * @param $model
     * @param $query
     * @return array
     */
    private function _loadWithPrimaryKey($primaryValue, $model, $query)
    {
        if (NULL !== $primaryValue) {
            $this->_primaryValue = $primaryValue;
            $query[] = ' WHERE ' . $model::PRIMARY . ' = ' . $this->_primaryValue;
            return $query;
        }

        return $query;
    }

    /**
     * @param $dataCollection
     * @param $model
     */
    private function _loadSingleEntry($dataCollection, $model)
    {
        foreach ($dataCollection as $_data) {
            $model = $this->_setProperties($_data, new $model());
            $this->_dataCollection[] = $model;
        }
    }
}
