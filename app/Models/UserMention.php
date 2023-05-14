<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class UserMention extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'users';

    public function searchableAs()
    {
        return 'users_mentions';
    }

    public function toSearchableArray()
    {
        return [
            'value' => $this->username,
            'label' => $this->name . ' (@' . $this->username . ')',
        ];
    }
}
