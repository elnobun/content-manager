<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

/**
 * @property mixed email
 *
 *
 */
class AuthController extends Controller
{
    /**
     * @param UserRegisterRequest $request
     * @return UserResource
     */
    public function register(UserRegisterRequest $request)
    {
        // create the user
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);

        if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return abort(401);
        }

        return (new UserResource($request->user()))->additional([
           'meta' => [
               'token' => $token,
           ]
        ]);
    }

    public function login(UserLoginRequest $request)
    {
        if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([
               'errors' => [
                   'email' => 'Not Authorized'
               ]
            ], 422);
        }

        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token,
            ]
        ]);
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function logout()
    {
        auth()->logout();
        return response('user logged out');
    }
}
