<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function updateBalance(Request $request){
        $user = auth()->user();
        $newBalance = $user->balance + $request->balance;
        $user->update(['balance' => $newBalance]);
        return response()->json(["balance" => $newBalance], 200);
    }

    public function getBalance(Request $request){
        $user = auth()->user();
        return response()->json(["balance" => $user->balance], 200);
    }
}
