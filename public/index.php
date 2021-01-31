<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Kernel\Request;
use App\Kernel\Router;

$request = new Request();
$router = new Router();
$router->register('routes.php');

header("Content-Type: application/json");
print_r($router->resolve($request));