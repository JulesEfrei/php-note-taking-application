<?php

require_once('vendor/autoload.php');

/*
 * Autoload classes
 * We only need to import classes inside "/src" so don't need to create our Autolaod class.
 */
spl_autoload_register(function ($class_name) {
    require "src/" . str_replace("\\", "/", $class_name) . '.php';
});

use Controller\Router;

$controllers = require  __DIR__ . '/config.php';

$router = new Router($controllers);

$response = $router->match();

echo $response;