<?php

namespace App\Services;

use App\Models\Category;

class CategoryService extends Service
{
    public function list()
    {
        return Category::has('items')->get();
    }

    public function create()
    {

    }
}
