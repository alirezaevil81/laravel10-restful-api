<?php

namespace App\Services;

use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\Role;

class RoleService
{

    public function addNewRole(array $inputs): ServiceResult
    {
        return app(ServiceWrapper::class)(function () use ($inputs){
            return Role::create($inputs);
        });
    }

    public function updateRole(array $inputs , Role $role): ServiceResult
    {
        return app(ServiceWrapper::class)(function () use ($inputs, $role){
            return $role->update($inputs);
        });
    }
}