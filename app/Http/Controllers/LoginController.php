<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\LoginStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginStoreRequest $request)
    {


        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['xat' => 'xatolik '], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Vel token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
