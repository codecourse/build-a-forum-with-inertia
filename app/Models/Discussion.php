<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    public function scopeOrderByPinned($query)
    {
        $query->orderBy('pinned_at', 'asc');
    }

    public function isPinned()
    {
        return !is_null($this->pinned_at);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class)
            ->whereNull('parent_id');
    }

    public function latestPost()
    {
        return $this->hasOne(Post::class)
            ->latestOfMany();
    }
}
