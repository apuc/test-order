<?php

session_start();

use App\Core\Router;
use App\Services\Database;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/');

Database::getInstance();
$router = new Router();
$router->run();
