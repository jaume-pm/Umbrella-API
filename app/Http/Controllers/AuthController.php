<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'balance' => 'required|numeric', // Add validation for the balance field
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $request->all()], 422);
        }
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'balance' => $request->balance,
            ]);
    
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json(['token' => $token], 201);
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

                return response()->json(['token' => $token], 200);
            } else {
                throw ValidationException::withMessages(['message' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Login failed.'], 401);
        }
    }
}
