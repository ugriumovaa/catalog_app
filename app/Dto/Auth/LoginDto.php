<?php

namespace App\Dto\Auth;

use Spatie\LaravelData\Data;

class LoginDto extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
