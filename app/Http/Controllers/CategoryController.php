<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService,
    ) {}

    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection($this->categoryService->getCategories());
    }
}
