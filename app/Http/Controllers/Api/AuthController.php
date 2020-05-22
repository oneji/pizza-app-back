<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class AuthController extends Controller
{
    /**
     * Login the user and send the token back
     *
     * @param   \App\Http\Requests\LoginRequest $request
     * 
     * @return  \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password    
        ];

        if(Auth::attempt($credentials)){ 
            $user = Auth::user();
   
            return response()->json([
                'ok' => true,
                'token' => $user->createToken('MyApp')->accessToken,
                'user' => $user
            ]);
        }  else{ 
            return response()->json([
                'ok' => false,
                'message' => 'Incorrect email or password'
            ]);
        } 
    }

    /**
     * Fetch the user by token
     * 
     * @param   \Illuminate\Http\Request $request
     * 
     * @return  \Illuminate\Http\JsonResponse 
     */
    public function fetchUser(Request $request)
    {
        return response()->json([
            'ok' => true,
            'user' => $request->user()
        ]);
    }
}
