<?php

use App\Controllers\DashboardController;
use Core\Route;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Middleware\Guest;
use App\Controllers\RegisterController;
use App\Middleware\Auth;

(new Route)
    ->get("/", HomeController::class, Guest::class)
    ->get("/dashboard", [DashboardController::class, "index"], Auth::class)
    ->get('/register', [RegisterController::class, 'index'], Guest::class)
    ->post('/register', [RegisterController::class, 'register'], Guest::class)
    ->get('/login', [LoginController::class, 'index'], Guest::class)
    ->post('/login', [LoginController::class, 'login'], Guest::class)
    ->run();
