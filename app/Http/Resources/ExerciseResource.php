<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
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
            'question'    => $this->question,
            'answer'      => $this->answer,
            'language_id' => $this->language_id,
            'language'    => $this->language->longName,
            'inLessons'   => $this->lessons()->count(),
        ];
    }
}
