<?php

namespace App\Dto;

use Illuminate\Http\Request;

class ItemDto extends AbstractDto
{
    public readonly string $name;
    public readonly CategoryDto $categoryDto;

    public static function fromRequest(Request $request): ItemDto
    {
        $dto = new self();
        $dto->name = $request->get('name');
        $dto->categoryDto = new CategoryDto();
        $dto->categoryDto->id = $request->get('category_id');

        return $dto;
    }
}
