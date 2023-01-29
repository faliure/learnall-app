<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'      => $this->name,
            'slug'      => $this->slug,
            'words'     => $this->resource->lazyRelation('words')->count(),
            'sentences' => $this->resource->lazyRelation('sentences')->count(),
        ];
    }
}
