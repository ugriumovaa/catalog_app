<?php

namespace App\Dto\Product;

use Spatie\LaravelData\Data;

class ProductUpdateDto extends Data
{
    public function __construct(
        public int $id,

        public ?string $name,
        public ?string $description,
        public ?string $price,
        public ?int $category_id,
    ) {}
}
