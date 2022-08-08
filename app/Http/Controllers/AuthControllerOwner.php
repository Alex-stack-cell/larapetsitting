<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthControllerOwner extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'lastName' => 'required|string',
            'firstName' => 'required|string',
            'birthdate' => 'date',
            'email' => 'required|string|unique:owners,email',
            'password'=>'required|string|min:8',
            'password_confirmation' => 'required|string|min:8|same:password'
        ]);

        $owner = Owner::create([
            'lastName' => $fields['lastName'],
            'firstName' => $fields['firstName'],
            'birthdate' => $fields['birthdate'],
            'email' => $fields['email'],
            'password'=> bcrypt($fields['password']),
            // 'remember_token'=>''
        ]);

        $token = $owner->createToken('petsittingToken')->plainTextToken;
        // $owner->remember_token = $token;

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

        $user = Owner::where('email', $fields['email'])->first();
        
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
        
        return response($response,201);
    }
}