<?php

namespace App\Extensions\Inertia;

use App\Contracts\JsonResourceable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceResponse;
use InvalidArgumentException;

class InertiaResource extends JsonResource
{
    public JsonResource $wrappedResource;

    /**
     * Create a new instance with a wrapped JsonResource, depending on the type
     * of $resource passed:
     *  - JsonResource: just wrap it
     *  - JsonResourceable Model: wrap the Model's JsonResource representation
     *  - string: fetch all Models of this class and wrap as a ResourceCollection
     *
     * @param  mixed  $resource
     */
    public function __construct(JsonResource|JsonResourceable|string $resource)
    {
        if ($resource instanceof JsonResource) {
            $this->wrappedResource = $resource;
        } elseif ($resource instanceof JsonResourceable) {
            $this->wrappedResource = $resource->resource();
        } elseif (implementsInterface($resource, JsonResourceable::class)) {
            $this->wrappedResource = $resource::resources();
        } else {
            throw new InvalidArgumentException("$resource is not JsonResourceable");
        }
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\IntertiaJsonResponse
     */
    public function toResponse($request)
    {
        $response = (new ResourceResponse($this->wrappedResource))->toResponse($request);

        return new JsonResponse($response->getData()->data);
    }
}
