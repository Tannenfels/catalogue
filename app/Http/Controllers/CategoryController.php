<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private Service $service;

    public function __construct()
    {
        $this->service = new CategoryService();
    }

    public function list()
    {
        $categories = $this->service->list();

        return response()->json($categories);
    }
}
