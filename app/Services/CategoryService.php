<?php

namespace App\Services;

use App\Dto\CategoryDto;
use App\Models\Category;

class CategoryService extends Service
{
    public function list()
    {
        return Category::has('items')->get();
    }

    public function create(CategoryDto $dto): void
    {
        $category = new Category();
        $category->name = $dto->name;

        $category->save();
    }

    public function update(CategoryDto $dto): void
    {
        $category = Category::query()->findOrFail($dto->id);

        $category->name = $dto->name;
    }

    public function delete()
    {

    }
}
