<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;

Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/contact', [ContactController::class, 'send']);
