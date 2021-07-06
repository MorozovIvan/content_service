<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    /**
     * @OA\Post(
     *      path="/register",
     *      operationId="register",
     *      tags={"User"},
     *      summary="Store new user",
     *      description="Returns users data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreUserRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => 'required|max:55',
            'email'    => 'email|required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        /**
         * @var User $user
         */
        $user = User::create($validatedData);

        $token = $request->user()->createToken('authToken');

        return response(['user' => $user, 'access_token' => $token->plainTextToken], 201);
    }

    /**
     * @OA\Post(
     *      path="/login",
     *      operationId="login",
     *      tags={"User"},
     *      summary="Login",
     *      description="Returns users data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AuthUserRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email'    => 'email|required',
            'password' => 'required',
        ]);

        if (! auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

        $token = $request->user()->createToken('authToken');

        return response(['user' => auth()->user(), 'access_token' => $token->plainTextToken]);
    }
}
