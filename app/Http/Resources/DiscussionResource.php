<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscussionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id"=>$this->id,
            "title"=>$this->title,
            "text"=>$this->text,
            "category_id"=>$this->category_id,
            "user_id"=>$this->user_id,
            "image"=>$this->image,
        ];
    }
}
