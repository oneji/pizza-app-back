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
     * @return \Illuminate\Http\Response
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
}
