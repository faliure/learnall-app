<?php

namespace App\Contracts;

use App\Services\CustomBuilder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface JsonResourceable
{
    public function resource(): JsonResource;

    public static function resources(): ResourceCollection;

    public static function resourcesBuilder(): CustomBuilder;
}
