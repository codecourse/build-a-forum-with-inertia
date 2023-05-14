<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class DiscussionResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'is_pinned' => $this->isPinned(),
            'replies_count' => $this->replies_count,
            // 'replies_count' => $this->replies_count . ' ' . Str::plural('reply', $this->replies_count),
            'topic' => TopicResource::make($this->whenLoaded('topic')),
            'post' => PostResource::make($this->whenLoaded('post')),
            'solution' => PostResource::make($this->whenLoaded('solution')),
            'latest_post' => PostResource::make($this->whenLoaded('latestPost')),
            'participants' => PublicUserResource::collection($this->whenLoaded('participants')),
            'user_can' => [
                'reply' => auth()->user()?->can('reply', $this->resource),
                'delete' => auth()->user()?->can('delete', $this->resource),
                'solve' => auth()->user()?->can('solve', $this->resource),
            ]
        ];
    }
}
