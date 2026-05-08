<?php

namespace App\Services;

use App\Dto\Auth\AuthDto;
use App\Dto\Auth\LoginDto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login(LoginDto $loginDto): AuthDto
    {
        $user = User::where('email', $loginDto->email)->first();

        if (! $user || ! Hash::check($loginDto->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return new AuthDto(
            token: $token
        );
    }

    public function logout(): void
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();
    }
}
