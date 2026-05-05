<?php

namespace App\Services;

use App\Dto\Product\ProductData;
use App\Dto\Product\ProductSearchDto;
use App\Dto\Product\ProductCreateDto;
use App\Models\Product;
use Illuminate\Pagination\AbstractPaginator;

class ProductService
{
    public function getProducts(ProductSearchDto $productSearchDto): AbstractPaginator
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
        return ProductData::from(Product::with('category')->findOrFail($productId));
    }

    public function createProduct(ProductCreateDto $productCreateDto): void
    {
        Product::create($productCreateDto->toArray());
    }


}
