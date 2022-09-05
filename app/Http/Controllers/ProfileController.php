<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Retweets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $retweets = Retweets::where('user_id', $user->id)->pluck('post_id')->toArray();
        $posts = Post::where('user_id', $user->id)->pluck('id')->toArray();
        $all_posts_id = array_merge($retweets, $posts);
        $all_posts = Post::whereIn('id', $all_posts_id)->get();
        return view('Profile.index', ['posts' => $all_posts, 'user' => $user]);
    }

    public function edit(User $user)
    {
        // dd($user);
        $user = Auth::user($user);

        return view('Profile.edit')->with('user', $user);
    }


    public function update(StoreProfileRequest $request, $id)
    {

        $data = $request->validated();


        if ($request->avatar) {

            $avatar = $this->uploadImage($request, "avatars",  'avatar');
            $data['avatar'] = $avatar;
        }
        $user = User::findOrFail($id);
        $user->update($data);
        $user->save();
        // $data->save();
        return redirect()->route('profile.index')->with('success', 'profile Updated');
    }
}
