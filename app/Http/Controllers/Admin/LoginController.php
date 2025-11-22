<?php

namespace App\Http\Controllers\Admin;

use App\Http\ApiRequests\Admin\Auth\LoginApiRequest;
use App\Http\Controllers\Controller;
use App\RestfulApi\Facades\ApiResponse;

class LoginController extends Controller
{
    public function __invoke(LoginApiRequest $request)
    {
        if (! auth()->attempt($request->validated())) {
            return ApiResponse::withMessage(__('auth.failed'))
                ->withStatus(401)
                ->build()
                ->response();

        }

        $user = auth()->user();
        $token = $user->createToken('API TOKEN')->plainTextToken;

        return ApiResponse::withAppends([
            'token' => $token,
        ])->build()->response();

    }
}
