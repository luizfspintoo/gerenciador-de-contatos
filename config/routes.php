<?php

use Core\Route;
use App\Controllers\HomeController;
use App\Middleware\Guest;
use App\Controllers\RegisterController;

(new Route)
    ->get("/", HomeController::class, Guest::class)
    ->get('/register', [RegisterController::class, 'index'], Guest::class)
    ->run();
