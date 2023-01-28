<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'language_id' => $this->unit->language_id,
            'language'    => $this->unit->language->longName,
            'unit'        => new JsonResource($this->whenLoaded('unit')),
            'exercises'   => JsonResource::collection($this->whenLoaded('exercises')),
        ];
    }
}
