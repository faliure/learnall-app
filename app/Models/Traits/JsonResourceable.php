<?php

namespace App\Models\Traits;

use App\Exceptions\NonResourceableModelException;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait JsonResourceable
{
    /**
     * Create and return a ResourceCollection with all items of the current
     * Model (if $max is supplied, include a maximum of $max items).
     */
    public static function resources(?int $max = null): ResourceCollection
    {
        $resourceClass = static::resourceClass();

        if (! class_exists($resourceClass)) {
            throw new NonResourceableModelException(
                'Cannot find a JsonResource for a collection of ' .
                class_basename(static::class) . ' Models'
            );
        }

        $models = $max ? static::take($max)->get() : static::all();

        return $resourceClass::collection($models);
    }

    /**
     * Return an aray with the ResourceCollection internal data (see @resources).
     */
    public static function resourcesDataArray(?int $max = null): array
    {
        return json_decode(static::resources($max)->toJson(), true);
    }

    /**
     * Convert the current Model to its corresponding JsonResourse.
     */
    public function toResource(): JsonResource
    {
        $resourceClass = static::resourceClass();

        if (! class_exists($resourceClass)) {
            throw new NonResourceableModelException(
                'Cannot find a JsonResource for ' .
                class_basename(static::class) . ' Model #' . $this->getKey()
            );
        }

        return new $resourceClass($this);
    }

    public function toResourceArray(): array
    {
        return json_decode($this->toResource()->toJson(), true);
    }

    private static function resourceClass(): string
    {
        $modelClass = class_basename(static::class);

        return "\\App\\Http\\Resources\\{$modelClass}Resource";
    }
}
