<?php

use App\Kernel\Router;

Router::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Router::get('/redirect', [\App\Http\Controllers\HomeController::class, 'redirect']);
Router::get('/users', [\App\Http\Controllers\UserController::class, 'index']);