<?php

/**
 * Resource handling
 */
namespace Codersquad\Datatype;

/**
 * Class Resource
 *
 * @package Codersquad\Datatype
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
class Resource
{
    /**
     * Check if it is a resource
     *
     * @param resource $resource The resource
     *
     * @return bool
     */
    public static function isResource($resource)
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
        return String::isNotEmpty($resource);
    }
} 