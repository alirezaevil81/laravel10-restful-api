<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RestfulApi\Facades\ApiResponse;
use Illuminate\Http\Request;

class GetCurrentUserController extends Controller
{
    public function __invoke()
    {
        return ApiResponse::withAppends([
            'name' => auth()->user()->full_name,
        ])
            ->build()
            ->response();
    }
}
