<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class NoRepliesQueryFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->has('posts', '=', 1);
    }
}
