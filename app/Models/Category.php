<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    protected $table = 'categories';
    protected $with = ['items'];
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Item::class, 'items_categories', 'category_id', 'item_id');
    }
}
