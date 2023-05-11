<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscussionRequest;
use App\Models\Discussion;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class DiscussionStoreController extends Controller
{
    public function __invoke(StoreDiscussionRequest $request)
    {
        $discussion = Discussion::make([
            'title' => $request->title,
        ]);

        $discussion->user()->associate($request->user());
        $discussion->topic()->associate(Topic::find($request->topic_id));

        $discussion->save();

        $post = Post::make([
            'body' => $request->body
        ]);

        $post->user()->associate($request->user());

        $discussion->posts()->save($post);

        return redirect()->route('discussions.show', $discussion);
    }
}
