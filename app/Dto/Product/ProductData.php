<?php

namespace App\Dto;

use App\Category\CategoryDto;
use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public string $price,

        public CategoryDto $category,

    ) {}

}
