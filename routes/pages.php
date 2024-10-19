<?php

use App\Application\Router\Route;
use App\Controllers\PageController;
use App\Middleware\GuestMiddleware;

Route::page('/', PageController::class, 'home', );