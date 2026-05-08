<?php

namespace App\Dto\Product;

use App\Dto\Category\CategoryDto;
use Spatie\LaravelData\Data;

class ProductDto extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public string $price,

        public CategoryDto $category,

    ) {}

}
