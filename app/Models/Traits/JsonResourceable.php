<?php

namespace App\Models\Traits;

use App\Exceptions\NonResourceableModelException;
use App\Services\CustomBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait JsonResourceable
{
    public static function resourcesBuilder(): CustomBuilder
    {
        return (new CustomBuilder(static::class))
            ->setCallback(
                fn ($models) => static::resourceClass()::collection($models),
                CustomBuilder::GET
            )->setCallback(
                fn ($model) => $model->resource(),
                CustomBuilder::FIRST
            );
    }

    /**
     * Create a ResourceCollection with items of this Model.
     */
    public static function resources(): ResourceCollection
    {
        return static::resourcesBuilder()->get();
    }

    /**
     * Convert the current Model to its corresponding JsonResourse.
     */
    public function resource(): JsonResource
    {
        $resourceClass = static::resourceClass();

        return new $resourceClass($this);
    }

    /**
     * Array/Json representation based on the corresponding JsonResource
     * definition (may be overriden in JsonResourceable Model as needed).
     */
    public function toArray(): array
    {
        return $this->resource()->resolve(new Request());
    }

    private static function resourceClass(): string
    {
        $modelClass    = class_basename(static::class);
        $resourceClass = "\\App\\Http\\Resources\\{$modelClass}Resource";

        if (! class_exists($resourceClass)) {
            throw new NonResourceableModelException(
                'No JsonResource defined for Model ' . class_basename(static::class)
            );
        }

        return $resourceClass;
    }
}
