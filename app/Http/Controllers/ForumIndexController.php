<?php

namespace App\Http\Controllers;

use App\Http\QueryFilters\NoRepliesQueryFilter;
use App\Http\Resources\DiscussionResource;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ForumIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return inertia()->render('Forum/Index', [
            'query' => (object) $request->query(),

            'discussions' => DiscussionResource::collection(
                QueryBuilder::for(Discussion::class)
                    ->allowedFilters($this->allowedFilters())
                    ->with(['topic', 'post', 'latestPost.user', 'participants'])
                    ->withCount('replies')
                    ->orderByPinned()
                    ->orderByLastPost()
                    ->paginate(1)
                    ->appends($request->query())
            )
        ]);
    }

    protected function allowedFilters()
    {
        return [
            AllowedFilter::custom('noreplies', new NoRepliesQueryFilter())
        ];
    }
}
