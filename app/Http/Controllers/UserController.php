<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\UserService;

class UserController extends Controller
{
    /** @var UserService */
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('users')->with([
            'users' => $this->userService->get()
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {

            return response()->json([

                'message' => 'error',
                'login_state' => "false",
            ], 401);

        }

        $user = auth()->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'login_state' => "true",
            'api_token' => $token,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
     ]);
    }
}
