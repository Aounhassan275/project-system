<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        if(!$user)
        {
            return response([
                'message' => 'Register Your Account'
            ], 401);
        }
        // Check password
        if( !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong Password'
            ], 401);
        }
        if($user->getRole() == 'Crp' || $user->getRole() == 'Field Staff' )
        {
            $token = $user->createToken('myapptoken')->plainTextToken;
    
            $response = [
                'user' => $user,
                'token' => $token
            ];
    
            return response($response, 201);

        }else{
            return response([
                'message' => 'Unauthorize'
            ], 401);
        }
    }
}
