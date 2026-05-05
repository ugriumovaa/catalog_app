<?php

namespace App\Dto\Product;

use App\Dto\Category\CategoryData;
use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public int          $id,
        public string       $name,
        public string       $description,
        public string       $price,

        public CategoryData $category,

    ) {}

}
