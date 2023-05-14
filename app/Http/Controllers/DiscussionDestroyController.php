<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscussionDestroyRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionDestroyController extends Controller
{
    public function __invoke(DiscussionDestroyRequest $request, Discussion $discussion)
    {
        $discussion->delete();

        return redirect()->route('home');
    }
}
