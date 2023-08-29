<?php

use Core\Route;
use App\Controllers\HomeController;
use App\Controllers\UserController;

Route::get('/', [HomeController::class, 'Homepage']);
Route::get('/user', [UserController::class, 'User']);
// ... more routes ...
