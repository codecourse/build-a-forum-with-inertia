<?php

namespace App\Http\Controllers;

use App\Http\QueryFilters\MentionedQueryFilter;
use App\Http\QueryFilters\MineQueryFilter;
use App\Http\QueryFilters\NoRepliesQueryFilter;
use App\Http\QueryFilters\ParticipatingQueryFilter;
use App\Http\QueryFilters\SolvedQueryFilter;
use App\Http\QueryFilters\TopicQueryFilter;
use App\Http\QueryFilters\UnsolvedQueryFilter;
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
                    ->tap(function ($builder) use ($request) {
                        if (filled($request->search)) {
                            return $builder->whereIn('id', Discussion::search($request->search)->get()->pluck('id'));
                        }
                    })
                    ->paginate(10)
                    ->appends($request->query())
            )
        ]);
    }

    protected function allowedFilters()
    {
        return [
            AllowedFilter::custom('noreplies', new NoRepliesQueryFilter()),
            AllowedFilter::custom('topic', new TopicQueryFilter()),
            AllowedFilter::custom('solved', new SolvedQueryFilter()),
            AllowedFilter::custom('unsolved', new UnsolvedQueryFilter()),

            AllowedFilter::custom('mine', new MineQueryFilter()),
            AllowedFilter::custom('participating', new ParticipatingQueryFilter()),
            AllowedFilter::custom('mentioned', new MentionedQueryFilter()),
        ];
    }
}
