<?php

namespace App\Dto;
use Illuminate\Http\Request;

abstract class AbstractDto
{
    abstract static function fromRequest(Request $request);
}
