<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AssignRolesToUserController;
use App\Http\Controllers\Admin\GetCurrentUserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', LoginController::class)->name('login');


Route::middleware('auth:sanctum')->group(function () {

    Route::get('current-user', GetCurrentUserController::class)->name('current-user');
    Route::delete('/logout', LogoutController::class)->name('logout');
    Route::apiResource('roles', RoleController::class);
    Route::post('users/{user}/assign-roles', AssignRolesToUserController::class)->name('users.assign-roles');
    Route::apiResource('users', UserController::class);
    Route::apiResource('articles', ArticleController::class)->only(['index']);
});

