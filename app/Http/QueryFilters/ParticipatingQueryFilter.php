<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class ParticipatingQueryFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (!auth()->user()) {
            return;
        }

        $query
            ->where('user_id', '!=', auth()->id())
            ->whereHas('posts', function ($query) {
                $query->whereBelongsTo(auth()->user());
            });
    }
}
