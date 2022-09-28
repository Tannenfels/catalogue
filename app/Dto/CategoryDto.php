<?php

namespace App\Dto;
use Illuminate\Http\Request;

final class CategoryDto extends AbstractDto
{
    public readonly ?string $name;
    public ?int $id;

    public static function fromRequest(Request $request): CategoryDto
    {
        $dto = new self();
        $dto->name = $request->get('name');

        return $dto;
    }

    public static function fromUpdateRequest(Request $request): CategoryDto
    {
        $dto = new self();
        $dto->name = $request->get('name');

        return $dto;
    }
}
