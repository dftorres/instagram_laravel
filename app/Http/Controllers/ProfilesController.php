<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // True if the authenticated user follows this profile
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postsCount = $user->posts->count();

        $followersCount = $user->profile->followers->count();

        $followingCount = $user->following->count();

        return view("profiles.index", compact(
            "user",
            "follows",
            "postsCount",
            "followersCount",
            "followingCount",
        ));
    }

    public function edit(User $user)
    {
        $this->authorize("update", $user->profile);
        return view("profiles.edit", compact("user"));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            "title" => "required",
            "description" => "required",
            "url" => "url",
            "image" => "",
        ]);

        if (request("image")) {
            $imgPath = request("image")->store("profile", "public");
            $image = Image::make(public_path("/storage/{$imgPath}"))->fit(1000, 1000);
            $image->save();
            $imgArray = ["image" => $imgPath];
        }

        auth()->user()->profile()->update(array_merge(
            $data,
            $imgArray ?? []
        ));

        return redirect(route("profile.index", $user));
    }
}
