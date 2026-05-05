<?php

namespace App\Services;

use App\Dto\Product\ProductData;
use App\Dto\Product\ProductSearchDto;
use App\Models\Product;

class ProductService
{
    public function getProducts(ProductSearchDto $productSearchDto)
    {
        $query = Product::query()
            ->with('category')
            ->byCategory($productSearchDto->category_id)
            ->latest();

        return ProductData::collect(
            $query->paginate(
                perPage: $productSearchDto->per_page,
                page: $productSearchDto->page,
            )
        );
    }

    public function getProduct(int $productId): ProductData
    {
        return ProductData::from(Product::findOrFail($productId));
    }

}
