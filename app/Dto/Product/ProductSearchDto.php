<?php

namespace App\Dto\Product;

use Spatie\LaravelData\Data;

class ProductSearchDto extends Data
{
    public function __construct(
        public ?int $category_id = null,
        public int $page = 1,
        public int $per_page = 12,
    ) {}
}
