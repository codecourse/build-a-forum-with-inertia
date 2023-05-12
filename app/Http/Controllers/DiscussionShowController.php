<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscussionResource;
use App\Http\Resources\PostResource;
use App\Models\Discussion;
use App\Models\Post;
use Illuminate\Http\Request;

class DiscussionShowController extends Controller
{
    public function __invoke(Request $request, Discussion $discussion)
    {
        $discussion->load(['topic', 'posts.discussion']);
        $discussion->loadCount('replies');

        return inertia()->render('Forum/Show', [
            'query' => $request->query(),
            'discussion' => DiscussionResource::make($discussion),
            'posts' => PostResource::collection(
                Post::whereBelongsTo($discussion)
                    ->with(['user', 'discussion'])
                    ->oldest()
                    ->paginate(10)
            ),
        ]);
    }
}
