<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Kernel\Request;

header("Content-Type: application/json");
$request = new Request();
print_r($request);