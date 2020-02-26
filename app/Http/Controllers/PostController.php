<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck("profiles.user_id");
        $posts = Post::whereIn("user_id", $users)->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store()
    {
        $data = request()->validate([
            "caption" => "required",
            "image" => ["required", "image"]
        ]);

        $imgPath = request("image")->store("uploads", "public");

        $image = Image::make(public_path("storage/{$imgPath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            "caption" => $data["caption"],
            "image" => $imgPath
        ]);
        return redirect(route("profile.index", auth()->user()));
    }

    public function show(Post $post)
    {
        $likesCount = $post->likes->count();
        $liked = $post->likes->contains(auth()->user()->id);
        return view("posts.show", compact("post", "likesCount", "liked"));
    }
}
