<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostDestroyRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostDestroyController extends Controller
{
    public function __invoke(PostDestroyRequest $request, Post $post)
    {
        $post->delete();

        return back();
    }
}
