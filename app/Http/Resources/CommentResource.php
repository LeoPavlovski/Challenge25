<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //displaying the items in postman
        return [
            "comment_id"=>$this->id,
            "comment"=>$this->comment,
            'discusion_id'=>$this->discusion_id,
            "user_id"=>$this->user_id,
        ];
    }
}
