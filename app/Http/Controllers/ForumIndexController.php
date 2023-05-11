<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumIndexController extends Controller
{
    public function __invoke()
    {
        return inertia()->render('Forum/Index');
    }
}
