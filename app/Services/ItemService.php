<?php

namespace App\Services;

use App\Dto\CategoryDto;
use App\Dto\ItemDto;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemsCategories;
use Illuminate\Support\Facades\DB;

class ItemService extends Service
{
    public function list(CategoryDto $dto)
    {
        return Item::query()
            ->join('items_categories', 'id', '=', 'item_id')
            ->where('items_categories.category_id', '=', $dto->id)
            ->get();
    }

    public function create(ItemDto $dto): void
    {
        DB::transaction(function () use ($dto) {
            $item = new Item();
            $item->name = $dto->name;

            $intermediate = new ItemsCategories();

            $item->save();
            $intermediate->item_id = $item->id;
            $intermediate->category_id = $dto->categoryDto->id;
            $intermediate->save();
        });


    }
}
