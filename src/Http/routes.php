<?php

use App\Kernel\Router;

Router::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Router::get('/login', [\App\Http\Controllers\HomeController::class, 'login']);