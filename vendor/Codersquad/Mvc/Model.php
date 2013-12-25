<?php

/**
 * Abstract class for model generating
 */
namespace Codersquad\Mvc;

/**
 * Class Model
 *
 * @package Codersquad\Mvc
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
abstract class Model
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

        if (substr($method, 0, 3) === 'set')
        {
            $this->set(lcfirst(substr($method, 3)), $arguments[0]);
            $returnValue = TRUE;
        }
        elseif (substr($method, 0, 3) === 'get')
        {
            $returnValue = $this->get(lcfirst(substr($method, 3)));
        }

        return $returnValue;
    }

    /**
     * Setter
     *
     * @param mixed $key   The key
     * @param mixed $value The value
     *
     * @return Model
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

        if (NULL !== $primaryValue)
        {
            $this->_primaryValue = $primaryValue;
            $query[] = ' WHERE '.$model::PRIMARY.' = '.$this->_primaryValue;
        }

        $dataCollection = $this->_databaseObject->getInstance()->setQuery(implode('', $query))->execute()->fetch();

        if (count($dataCollection) > 1 ||
                $primaryValue === NULL)
        {
            foreach($dataCollection as $_data)
            {
                $model = $this->_setProperties($_data, new $model());
                $this->_dataCollection[] = $model;
            }
        }
        elseif (count($dataCollection) > 2)
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
}
