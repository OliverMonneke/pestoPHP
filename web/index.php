<?php

use Codersquad\Core\Core;

/**
 * Main file for running the framework
 *
 * @author Oliver Monneke <oliver@codersquad.de>
 * @version 0.1
 */
define('BASE_PATH', __DIR__ . '/..');
define('NL', '<br />');

/** @noinspection PhpIncludeInspection */
require_once BASE_PATH.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$application = Core::getInstance();
$application->run();
