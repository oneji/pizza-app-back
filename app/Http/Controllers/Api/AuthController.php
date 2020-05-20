<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /**
     * Login the user and send the token back
     *
     * @param   \Illuminate\Http\Request $request
     * 
     * @return  \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
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
                'ok' => false
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
