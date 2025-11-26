<?php

namespace App\Http\Controllers\Admin;

use App\Http\ApiRequests\Admin\AccessLevel\AssignRolesToUserApiRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UsersDetailsApiResource;
use App\Models\User;
use App\RestfulApi\Facades\ApiResponse;
use App\Services\AccessLevelService;
use Illuminate\Http\Request;

class AssignRolesToUserController extends Controller
{
    public function __construct(
        public AccessLevelService $service,
    )
    {
    }

    public function __invoke(User $user, AssignRolesToUserApiRequest $request)
    {
       $result = $this->service->assignRolesToUser($user, $request->validated()['roles']);

        if (!$result->ok)
            return ApiResponse::withMessage('Something went wrong')->withstatus(500)->build()->response();


        return ApiResponse::build()->response();
    }
}
