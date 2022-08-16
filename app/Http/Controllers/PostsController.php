<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'image' => 'nullable',
        ]);

        $post = new Post;
        $post->body = $request->input('body');
        $post->img = $request->input('image');
        $post->user_id = auth()->user()->id;
        if ($request->image) {
            $extension = $request->file('image')->getClientOriginalExtension();
            // $image_name = Str::random(5).'.'.$extension;
            $name = $request->file('image')->getClientOriginalName();
            $image_name = $name . '.' . $extension;
            Storage::disk('public')->putFileAs(
                'posts_image/',
                $request->file('image'),
                $image_name
            );
            $post->img = $image_name;
        }
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);

        // $product = product::with('productImages','comment')->find($request->id);

        // if (is_null($product)) {
        //      return $this->sendError('product not found ');
        //      }
        //    return $this->returnData('data', $product);
        ///////////////////////////////////////////////////////////////////////////
        //    $post=Post::with('body','image')->find($request->id);
        //    if(is_null($post))
        //    {
        //     return ('Post Not Found');
        //    }
        //     return View('posts.show')->with('post','$post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $this->validate($request, [
            'body' => 'required',
            'image' => 'nullable'
        ]);

        $post->body = $request->input('body');
        if ($request->image) {
            if (File::exists($post->image_url)) {
                File::delete($post->image_url);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            // $image_name = Str::random(5).'.'.$extension;
            $name = $request->file('image')->getClientOriginalName();
            $image_name = $name . '.' . $extension;

            Storage::disk('public')->putFileAs(
                'posts_image/',
                $request->file('image'),
                $image_name
            );
            $post->img = $image_name;
        }

        $post->save();
        return redirect('/posts')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted successfully');
    }
}
