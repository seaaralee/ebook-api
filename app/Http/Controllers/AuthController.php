<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function me(){
        return
        [
            'nis' => 3103120153,
            'name' => 'Mutia Rani Zahra Meilani',
            'phone' => '081328142144',
            'class' => 'XII RPL 5'
        ];
    }

    // REGISTER
    public function register(request $request){
        $field = $request -> validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:8'
        ]);

        $user = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => bcrypt($field['password'])
        ]);

        $token = $user->CreateToken('seaara')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response ($response, 201);
    }

    // LOGIN
    public function login(Request $request){
        $fields = $request->validate([
           'email' => 'required|string',
           'password' => 'required|string'
        ]);

       //  check email
       $user = User::where('email', $fields['email'])->first();

       // check password
       if (!$user || !Hash::check($fields['password'], $user->password)){
           return response([
               'message' => 'unauthorized'
           ], 401);
       }

       $token = $user->CreateToken('seaara')->plainTextToken;

       $response = [
           'user' => $user,
           'token' => $token
       ];
       
       return response($response, 201);
   }

   // LOGOUT
   public function logout(Request $request){
       $request ->user()->currentAccessToken()->delete();

       return [
           'message' => 'Logged Out!'
       ];
   }
}
