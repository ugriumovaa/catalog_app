<?php

namespace App\Dto\Auth;

use Spatie\LaravelData\Data;

class AuthDto extends Data
{
    public function __construct(
        public string $token
    ) {}
}
