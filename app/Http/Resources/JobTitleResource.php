<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobTitleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
        'id' => $this->id,
        'name' => $this->name,
        'related_to' => $this->related_to,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        ];
    }
}
