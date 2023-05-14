<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class MentionedQueryFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (!auth()->user()) {
            return;
        }

        $query->whereHas('posts', function ($query) {
            $query->whereHas('mentions', function ($query) {
                $query->where('user_id', auth()->id());
            });
        });
    }
}
