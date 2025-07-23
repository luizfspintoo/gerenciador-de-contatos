<?php

use App\Controllers\Contacts\ContactEncryptionController;
use App\Controllers\Contacts\ContactController;
use App\Controllers\DashboardController;
use Core\Route;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Middleware\Guest;
use App\Controllers\RegisterController;
use App\Middleware\Auth;

(new Route)
    ->get("/", HomeController::class, Guest::class)
    ->get('/register', [RegisterController::class, 'index'], Guest::class)
    ->post('/register', [RegisterController::class, 'register'], Guest::class)
    
    ->get('/login', [LoginController::class, 'index'], Guest::class)
    ->post('/login', [LoginController::class, 'login'], Guest::class)
    ->get('/logout', [LoginController::class, 'logout'], Auth::class)
    
    ->get("/dashboard", [DashboardController::class, "index"], Auth::class)
    ->post("/contact/create", [ContactController::class, "create"], Auth::class)
    ->get("/contact/edit", [ContactController::class, "show"], Auth::class)
    ->put("/contact/update", [ContactController::class, "update"], Auth::class)
    ->delete("/contact/delete", [ContactController::class, "destroy"], Auth::class)

    //encryption e decryption
    ->get("/hide", [ContactEncryptionController::class, "hideInfo"], Auth::class)
    ->post("/dashboard", [ContactEncryptionController::class, "showInfo"], Auth::class)
    ->run();
