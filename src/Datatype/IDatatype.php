<?php

/**
 * Interface for data types
 */
namespace codersquad\pestophp\Datatype;

/**
 * Interface IDatatype
 *
 * @package codersquad\pestophp\Datatype
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