<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'balance' => $request->balance,
            ]);
    
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json(['token' => $token, 'role' => 'user', 'name' => $user->name], 200);
    }
    

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $user = $request->user();
                $token = $user->createToken('auth_token')->plainTextToken;
                $role = $user->role;

                return response()->json(['token' => $token, 'role' => $role, 'name' => $user->name], 200);
            } else {
                throw ValidationException::withMessages(['message' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Login failed.'], 401);
        }
    }
}
