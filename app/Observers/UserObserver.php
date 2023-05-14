<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->mention->searchable();
    }

    public function updated(User $user)
    {
        $user->mention->searchable();
    }
}
