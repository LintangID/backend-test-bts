<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login (Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where ('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credential are incorrect'],
            ]);
        }

        return $user->createToken('user login')->plainTextToken;

    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255'
        ]
        );

        $request['password'] = Hash::make($validatedData['password']);

        User::create($request->all());
        return response()->json('berhasil register');

    }
}
