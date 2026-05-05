<?php

namespace App\Http\Controllers;

use App\Dto\Product\ProductCreateDto;
use App\Dto\Product\ProductSearchDto;
use App\Dto\Product\ProductUpdateDto;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
    ) {}

    public function index(SearchRequest $request): AnonymousResourceCollection
    {
        $searchDto = new ProductSearchDto(
            category_id: $request->validated('category_id'),
            page: $request->validated('page') ?? 1,
            per_page: 12,
        );

        return ProductResource::collection($this->productService->getProducts($searchDto));
    }

    public function store(ProductStoreRequest $request): JsonResponse
    {
        $this->productService->createProduct(ProductCreateDto::from($request->validated()));

        return response()->json([], 204);
    }

    public function show(int $productId): ProductResource
    {
        return new ProductResource($this->productService->getProduct($productId));
    }

    public function update(ProductUpdateRequest $request, int $productId): JsonResponse
    {
        $updateDto = ProductUpdateDto::from([
            ...$request->validated(),
            'id' => $productId,
        ]);

        $this->productService->updateProduct($updateDto);

        return response()->json([], 204);
    }

    public function destroy(int $productId): JsonResponse
    {
        $this->productService->deleteProduct($productId);

        return response()->json([], 204);
    }
}
