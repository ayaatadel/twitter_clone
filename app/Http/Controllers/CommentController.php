<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comments;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $comment = $request->validated();

        $comment['user_id'] = Auth::id();
        $comment['post_id'] = $request->post_id;
        Comments::create($comment);

        return redirect()->back();
    }
}
