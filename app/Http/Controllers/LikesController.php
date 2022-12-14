<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Post $post)
    {

        $user_id = Auth::id();
        $post_id = $post->id;
        $temp = Like::where('user_id', $user_id)->where('post_id', $post_id);
        if ($temp->first() != null) {
            $temp->delete();
        } else {
            like::create([
                'user_id' => $user_id,
                'post_id' => $post_id
            ]);
        }
        return redirect()->back();
    }
}
