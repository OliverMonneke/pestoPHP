<?php

/**
 * Interface for logging
 */
namespace Codersquad\Pestophp\Log;

/**
 * Interface ILog
 *
 * @package Codersquad\Pestophp\Log
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
interface ILogger
{
    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function emergency($message, array $context = []);

    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function alert($message, array $context = []);

    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function critical($message, array $context = []);

    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function error($message, array $context = []);

    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function warning($message, array $context = []);

    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function notice($message, array $context = []);

    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function info($message, array $context = []);

    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function debug($message, array $context = []);

    /**
     * @param $level
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function log($level, $message, array $context = []);
}
