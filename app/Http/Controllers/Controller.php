<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *     title="My API documentation",
 *     version="1.0.0"
 * )
 * @OA\Tag(
 *     name="Users",
 *     description="API Endpoints for Users"
 * )
 *
 * @OA\Schema(
 *     schema="403ResponseSchema",
 *     @OA\Property(
 *        property="message",
 *        type="string",
 *        example="Unauthorized"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="isActiveFilterSchema",
 *     enum={true,false},
 *     type="boolean",
 *     default=true,
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
