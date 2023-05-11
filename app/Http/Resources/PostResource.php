<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'body_preview' => Str::limit($this->body, 200),
            'user' => PublicUserResource::make($this->whenLoaded('user')),
            'created_at' => DateTimeResource::make($this->created_at)
        ];
    }
}
