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
}
