<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            "message" => "user successfully registered",
            "data" => $user
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([            
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = auth()->user()->createToken('auth_token')->plainTextToken;

            return response()->json([
                "status" => "success",
                "message" => "user has been succesfully logged in",
                "user" => auth()->user(),
                "token" => $token
            ]);
        }else{
            return response()->json([
                "status" => "error",
                "message" => "Credentials doesnt match",                
            ]);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "status" => "success",
            "message" => "successfully logouted",                
        ]);
    }
}
