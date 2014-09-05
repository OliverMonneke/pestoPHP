<?php

/**
 * Interface for data types
 */
namespace Codersquad\Pestophp\Datatype;

/**
 * Interface IDatatype
 *
 * @package Codersquad\Pestophp\Datatype
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface IDatatype
{
    /**
     * Check if expression is valid
     *
     * @param mixed $expression The expression to check
     *
     * @return bool
     */
    public static function isValid($expression);
}
