<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    function store(User $user)
    {   
        $this->authorize('follow', $user->profile);
        return auth()->user()->following()->toggle($user->profile);
    }
}
