<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersFollowers;

class FollowController extends Controller
{
    public function userFollow(User $user)
    {
        $follower_id = Auth::id();
        $following_id = $user->id;
        $temp = UsersFollowers::where('follower_id', $follower_id)->where('following_id', $following_id);
        if ($temp->first() != null) {
            $temp->delete();
        } else {
            UsersFollowers::create([
                'follower_id' => $follower_id,
                'following_id' => $following_id
            ]);
        }
        return redirect()->back();
    }
}
