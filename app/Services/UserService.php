<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Debug\ExceptionHandler;

class UserService
{
    public function registerUser(array $inputs)
    {
        try {
            $inputs['password'] = bcrypt($inputs['password']);
            $user = User::create($inputs);


        }catch (\Throwable $th){
            app()[ExceptionHandler::class]->report($th);
            return [
                'ok' => false,
                'data' => $th->getMessage()
            ];
        }


        return [
            'ok' => true,
            'data' => $user
        ];
    }

}