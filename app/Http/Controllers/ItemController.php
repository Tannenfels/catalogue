<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use App\Services\Service;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private Service $service;

    public function __construct()
    {
        $this->service = new ItemService();
    }
}
