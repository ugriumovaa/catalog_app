<?php

namespace App\Services;

use App\Dto\Category\CategoryDto;
use App\Models\Category;
use Spatie\LaravelData\DataCollection;

class CategoryService
{
    public function getCategories(): DataCollection
    {
        return CategoryDto::collect(
            Category::select('id', 'name')->get()
        );
    }

}
