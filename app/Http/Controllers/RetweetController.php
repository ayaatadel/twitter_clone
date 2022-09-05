<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Retweets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function retweet(Post $post)
    {
        $user_id = Auth::id();
        $post_id = $post->id;
        $temp = Retweets::where('user_id', $user_id)->where('post_id', $post_id);
        if ($temp->first() != null) {
            $temp->delete();
        } else {
            Retweets::create(
                [
                    'user_id' => $user_id,
                    'post_id' => $post_id
                ]
            );
        }
        return redirect()->back();
    }
}
