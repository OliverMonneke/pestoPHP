<?php

/**
 * Object handling
 */
namespace Codersquad\Datatype;

/**
 * Class Object
 *
 * @package Codersquad\Datatype
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Object implements IDatatype
{
    /**
     * Check if it is an object
     *
     * @param object $object The object
     *
     * @return bool
     */
    public static function isValid($object)
    {
        return is_object($object);
    }

    /**
     * Convert object to array
     *
     * @param object $object The object
     *
     * @return array
     */
    public static function toArray($object)
    {
        return (array) $object;
    }
}