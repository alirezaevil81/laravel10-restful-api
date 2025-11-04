<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('articles', ArticleController::class)->only(['index']);