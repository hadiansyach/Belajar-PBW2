<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'fullname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);
        $user = User::create([
        'username' => $validatedData['username'],
        'fullname' => $validatedData['fullname'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
    }

    public function login(Request $request)
    {
    if (!Auth::attempt($request->only('username','fullname','email', 'password'))) {
        return response()->json([
        'message' => 'Invalid login details'

    ], 401);
    }
    $user = User::where('email', $request['email'])->firstOrFail();
    $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}
}
