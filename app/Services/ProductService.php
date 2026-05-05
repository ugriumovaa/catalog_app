<?php

namespace App\Services;

use App\Dto\ProductData;
use App\Dto\ProductCreateDto;
use App\Dto\ProductUpdateDto;
use App\Models\Product;

class ProductService
{
    public function getProducts()
    {
    }

    public function getProduct(int $productId): ProductData
    {
        return ProductData::from(Product::findOrFail($productId));
    }

}
