<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\GetCurrentUserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', LoginController::class);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('current-user', GetCurrentUserController::class);
    Route::delete('/logout', LogoutController::class);

    Route::apiResource('users', UserController::class);
    Route::apiResource('articles', ArticleController::class)->only(['index']);
});

