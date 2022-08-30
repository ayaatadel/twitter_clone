<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\User;
use Illuminate\Support\Str;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Comments;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function index()
    {
        $user = Auth::id();

        $following = Auth::user()->following()->pluck('id')->toArray();
        array_push($following, $user);

        $posts = Post::whereIn('user_id', $following)->orderby('created_at', "desc")->get();

        return view('posts.index', ['posts' => $posts]);
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(StorePostRequest $request)
    {

        // retreive all validate data
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        if ($request->image) {
            $image = $this->uploadImage($request, "posts_image",  'image');
            $data['img'] = $image;
        }
        Post::create($data);
        return redirect('/posts')->with('success', 'Post Created');
    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }


    public function update(StorePostRequest $request, $id)
    {

        $data = $request->validated();
        $data['user_id'] = Auth::id();
        if ($request->img) {
            $data['img'] = $this->uploadImage($request, "posts_image", 'img');
            // dd($data['img']);
        }

        $post = Post::findOrFail($id);
        $post->update($data);
        $post->save();
        return redirect('/posts')->with('success', 'Post updated');
    }







    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted successfully');
    }
}
