<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LanguageLevelController;
use App\Http\Controllers\SocialTypeController;
use App\Http\Controllers\SocialLinkController;

// Public routes
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/about', [AboutController::class, 'show']);
Route::get('/events', [EventController::class, 'index']);
Route::get('/skills', [SkillController::class, 'index']);

// Authenticated routes (cookie‑based SPA auth)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/contact', [ContactController::class, 'send']);
});
