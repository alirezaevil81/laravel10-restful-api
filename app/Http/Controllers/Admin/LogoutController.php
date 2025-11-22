<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RestfulApi\Facades\ApiResponse;

class LogoutController extends Controller
{
    public function __invoke()
    {
        auth()->user()->currentAccessToken()->delete();

        return ApiResponse::withMessage('Logged out successfully')->build()->response();
    }
}
