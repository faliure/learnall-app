<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface JsonResourceable
{
    public function toResource(): JsonResource;
}
