<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed title
 * @property mixed created_at
 * @property mixed user
 * @property mixed posts
 */
class TopicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'posts' => PostResource::collection($this->posts),
            'user' => $this->user,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
