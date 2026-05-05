<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
    ) {}

    public function index()
    {
        return ProductResource::collection($this->productService->getProducts());
    }

    public function store(ProductStoreRequest $request)
    {

    }

    public function show(string $productId): ProductResource
    {
        return new ProductResource($this->productService->getProduct($productId));
    }

    public function update(ProductUpdateRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
