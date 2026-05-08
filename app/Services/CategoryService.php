<?php

namespace App\Services;

use App\Dto\Category\CategoryDto;
use App\Models\Category;

class CategoryService
{
    public function getCategories(): mixed
    {
        return CategoryDto::collect(
            Category::select('id', 'name')->get()
        );
    }
}
