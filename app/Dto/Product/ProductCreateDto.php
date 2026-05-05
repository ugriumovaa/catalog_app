<?php
namespace App\Dto\Product;

use Spatie\LaravelData\Data;

class ProductCreateDto  extends Data
{
    public function __construct(
        public string $name,
        public string $description,
        public string $price,
        public int $category_id,
    ) {}
}
