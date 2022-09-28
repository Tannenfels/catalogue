<?php

namespace App\Http\Controllers;

use App\Dto\ItemDto;
use App\Services\ItemService;
use App\Services\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    private Service $service;

    public function __construct()
    {
        $this->service = new ItemService();
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function list(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'category_id' => ['integer', 'required']
        ]);

        $this->service->create(ItemDto::fromRequest($request));

        return response('OK', 200);
    }
}
