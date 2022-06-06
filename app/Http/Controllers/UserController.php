<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = $user->createToken('postapp')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }
    public function test(Request $request)
    {
      return "kambing";
    }

    public function logout(User $user){

        Auth::logout();
        $user->tokens()->delete();
        
        return [
            'message' => 'Log out succesfully',
        ];
    }

}
