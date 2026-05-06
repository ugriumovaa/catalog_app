<?php

namespace App\Http\Controllers;

use App\Dto\Auth\LoginDto;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Services\AuthService;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService,
    ) {}

    public function login (LoginRequest $request): AuthResource
    {
        return new AuthResource(
            $this->authService->login(
                LoginDto::from($request->validated())
            )
        );
    }

    public function logout(): Response
    {
        $this->authService->logout();

        return response()->noContent();
    }

}
