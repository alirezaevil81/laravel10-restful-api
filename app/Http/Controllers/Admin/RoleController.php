<?php

namespace App\Http\Controllers\Admin;

use App\Http\ApiRequests\Admin\Role\RoleStoreApiRequest;
use App\Http\ApiRequests\Admin\Role\RoleUpdateApiRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\RestfulApi\Facades\ApiResponse;
use App\Services\RoleService;

class RoleController extends Controller
{

    public function __construct(
        public RoleService $roleService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreApiRequest $request)
    {
        $result = $this->roleService->addNewRole($request->validated());

        if (!$result->ok)
            return ApiResponse::withMessage('Something went wrong')->withstatus(500)->build()->response();


        return ApiResponse::withMessage('Role created successfully')->withData($result->data)->build()->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateApiRequest $request, Role $role)
    {
        $result = $this->roleService->updateRole($request->validated(), $role);

        if (!$result->ok)
            return ApiResponse::withMessage('Something went wrong')->withstatus(500)->build()->response();


        return ApiResponse::withMessage('Role Updated successfully')->withData($result->data)->build()->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
