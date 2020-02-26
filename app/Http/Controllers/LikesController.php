<?php

namespace App\Http\Controllers;

use App\Post;

class LikesController extends Controller
{
    public function store(Post $post)
    {
        return auth()->user()->liked()->toggle($post);
    }
}
