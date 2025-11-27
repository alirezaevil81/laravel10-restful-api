<?php

namespace App\Http\Controllers\Admin;

use App\Http\ApiRequests\Admin\User\UserDeleteApiRequest;
use App\Http\ApiRequests\Admin\User\UserIndexApiRequest;
use App\Http\ApiRequests\Admin\User\UserShowApiRequest;
use App\Http\ApiRequests\Admin\User\UserStoreApiRequest;
use App\Http\ApiRequests\Admin\User\UserUpdateApiRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UsersDetailsApiResource;
use App\Http\Resources\UsersListApiResourceCollection;
use App\Models\User;
use App\RestfulApi\Facades\ApiResponse;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    /**
     * @OA\Get(
     *     path="/users",
     *     tags={"Users"},
     *     security={{"sanctum":{}}},
     *     summary="Get users list",
     *     @OA\Response(
     *         response=200,
     *         description="List of users"
     *     )
     * )
     */
    public function index(UserIndexApiRequest $request)
    {
        $result = $this->userService->getAllUsers($request->all());

        if (!$result->ok)
            return ApiResponse::withMessage('Something went wrong')->withstatus(500)->build()->response();


        return ApiResponse::withData(new UsersListApiResourceCollection($result->data))->build()->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreApiRequest $request)
    {
            $result = $this->userService->registerUser($request->validated());

            if (!$result->ok)
                return ApiResponse::withMessage('Something went wrong')->withstatus(500)->build()->response();


        return ApiResponse::withMessage('User created successfully')->withData($result->data)->build()->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(UserShowApiRequest $request,User $user)
    {
        $result = $this->userService->getUserInfo($user);

        if (!$result->ok)
            return ApiResponse::withMessage('Something went wrong')->withstatus(500)->build()->response();


        return ApiResponse::withData(new UsersDetailsApiResource($result->data))->build()->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateApiRequest $request, User $user)
    {
        $result = $this->userService->updateUser($request->validated(), $user);

        if (!$result->ok)
            return ApiResponse::withMessage('Something went wrong')->withstatus(500)->build()->response();


        return ApiResponse::withMessage('User updated successfully')->withData($result->data)->build()->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDeleteApiRequest $request,User $user)
    {
        $result = $this->userService->deleteUser($user);

        if (!$result->ok)
            return ApiResponse::withMessage('Something went wrong')->withstatus(500)->build()->response();

        return ApiResponse::withMessage('User deleted successfully')->build()->response();

    }

    private function apiResponse($message = null, $data = null, $status = 200)
    {

        $body = [];
        !is_null($message) && $body['message'] = $message;
        !is_null($data) && $body['data'] = $data;
        return response()->json($body, $status);
    }
}
