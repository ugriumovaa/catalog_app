<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public int $price,

        //add

    ) {}

}
