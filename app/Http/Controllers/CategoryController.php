<?php

namespace App\Http\Controllers;

use App\Dto\CategoryDto;
use App\Services\CategoryService;
use App\Services\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private Service $service;

    public function __construct()
    {
        $this->service = new CategoryService();
    }

    /**
     * @group Categories
     *
     * Get all categories of items.
     *
     * Empty categories (e.g. with no items) will not be returned.
     *
     *
     *
     * @return JsonResponse
     */
    public function list()
    {
        $categories = $this->service->list();

        return response()->json($categories);
    }

    /**
     * @group Categories
     *
     * Create a category.
     *
     * @bodyParam
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories']
        ]);

        $this->service->create(CategoryDto::fromRequest($request));

        return response('OK', 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer']
        ]);

        $this->service->update(CategoryDto::fromRequest($request));
    }

    public function delete(Request $request)
    {
        $this->service->delete(CategoryDto::fromRequest($request));
    }
}
