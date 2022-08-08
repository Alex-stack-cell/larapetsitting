<?php

namespace App\Http\Controllers;

use App\Models\Petsitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthControllerPetSitter extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'lastName' => 'required|string',
            'firstName' => 'required|string',
            'birthdate' => 'date',
            'email' => 'required|string|unique:owners,email',
            'petpreference' => 'required|string',
            'password'=>'required|string|min:8',
            'password_confirmation' => 'required|string|min:8|same:password'
        ]);

        $petsitter = Petsitter::create([
            'lastName' => $fields['lastName'],
            'firstName' => $fields['firstName'],
            'birthdate' => $fields['birthdate'],
            'email' => $fields['email'],
            'password'=> bcrypt($fields['password']),
            'petpreference' => $fields['petpreference']
            // 'remember_token'=>''
        ]);

        $token = $petsitter->createToken('petsittingToken')->plainTextToken;
        // $petsitter->remember_token = $token;

        return response($token,201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return[
            'message' => 'Logged out'
        ];
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = Petsitter::where('email', $fields['email'])->first();
        
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }
        
        $token = $user->createToken('petsittingToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($token,201);
    }
}