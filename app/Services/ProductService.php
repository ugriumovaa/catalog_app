<?php

namespace App\Services;

use App\Dto\Product\ProductData;
use App\Models\Product;

class ProductService
{
    public function getProducts()
    {
        return ProductData::collect(
            Product::with('category')->get()
        );
    }

    public function getProduct(int $productId): ProductData
    {
        return ProductData::from(Product::findOrFail($productId));
    }

}
