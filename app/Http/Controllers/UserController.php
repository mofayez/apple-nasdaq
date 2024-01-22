<?php

namespace App\Http\Controllers;

use App\Application\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller {
    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function register(Request $request) {
        $userData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = $this->userService->createUser($userData);

        // Generate and return JWT token or perform any other authentication logic
        return response()->json(['user' => $user], 201);
    }
}