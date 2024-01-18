<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $inputs = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'name' => ['required']
        ]);
        if ($user = User::create($inputs)) {
            $user->password = Hash::make($inputs['password']);
            $user->save();
            return response()->json(["message" => "User registered"], 201);
        }
        return response()->json("Error while creating account", 422);
    }
}
