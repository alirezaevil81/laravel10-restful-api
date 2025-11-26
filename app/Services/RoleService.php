<?php

namespace App\Services;

use App\Base\ServiceResult;
use App\Base\ServiceWrapper;
use App\Models\Role;
use Illuminate\Support\Arr;

class RoleService
{

    public function addNewRole(array $inputs): ServiceResult
    {
        return app(ServiceWrapper::class)(function () use ($inputs){
            $role = Role::create(Arr::except($inputs, 'permissions'));
            $role->permissions()->attach($inputs['permissions']);
            return $role;
        });
    }

    public function updateRole(array $inputs , Role $role): ServiceResult
    {
        return app(ServiceWrapper::class)(function () use ($inputs, $role){
            $role->update(Arr::except($inputs, 'permissions'));
            $role->permissions()->sync($inputs['permissions']);
            return $role;
        });
    }
}