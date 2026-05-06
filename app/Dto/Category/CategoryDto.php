<?php

namespace App\Dto\Category;

use Spatie\LaravelData\Data;

class CategoryDto extends Data
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
}
