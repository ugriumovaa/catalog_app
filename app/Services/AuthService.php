<?php

namespace App\Services;

use App\Dto\Auth\LoginDto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(LoginDto $loginDto): string
    {
        $user = User::where('email', $loginDto->email)->first();

        if (!$user || !Hash::check($loginDto->password, $user->password)) {
            return response()->json(['message'=>'Invalid Credential'],401) ;
        }

        return $user->createToken('api-token')->plainTextToken;
    }

    public function logout(): void
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();
    }
}
