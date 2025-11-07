<?php

namespace App\Services;

use App\Base\ServiceWrapper;
use App\Models\User;

class UserService
{
    public function registerUser(array $inputs)
    {
        return app(ServiceWrapper::class)(function () use ($inputs) {
            $inputs['password'] = bcrypt($inputs['password']);
            return User::create($inputs);
        });
    }

}