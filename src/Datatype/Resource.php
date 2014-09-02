<?php

/**
 * Resource handling
 */
namespace Codersquad\Pestophp\Datatype;

/**
 * Class Resource
 *
 * @package Codersquad\Pestophp\Datatype
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Resource implements IDatatype
{
    /**
     * Check if it is a resource
     *
     * @param resource $resource The resource
     *
     * @return bool
     */
    public static function isValid($resource)
    {
        return is_resource($resource);
    }

    /**
     * Check if resource is empty
     *
     * @param resource $resource The resource
     *
     * @return bool
     */
    public static function isEmpty($resource)
    {
        if (!self::isValid($resource) &&
            NULL !== $resource) {
            return false;
        }

        return String::isEmpty($resource);
    }

    /**
     * Check if resource is note empty
     *
     * @param resource $resource The resource
     *
     * @return bool
     */
    public static function isNotEmpty($resource)
    {
        if (!self::isValid($resource) &&
            null !== $resource) {
            return false;
        }

        return ($resource !== null && $resource !== '');
    }
}
