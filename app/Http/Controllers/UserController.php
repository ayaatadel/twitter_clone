<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UsersFollowers;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    //////////////////////////////////////////////////////////////

    public function profile(User $user)
    {
        $text = 'Follow';
        $follower_id = Auth::id();
        $following_id = $user->id;
        $temp = UsersFollowers::where('follower_id', $follower_id)->where('following_id', $following_id);
        if ($temp->first() != null) {
            $text = 'UnFollow';
        }

        return view('Profile.index', ['user' => $user, 'text' => $text]);
    }

    public function follow(User $user)
    {
        // people i follow
        $following = $user->following()->orderBy('id')->get();
        return view('followers.following', ['user' => $user, 'following' => $following]);
    }

    public function follower(User $user)
    {
        // people follow me
        $followers = $user->followers()->orderBy('id')->get();
        // dd($followers);
        return view('followers.followers', ['user' => $user, 'followers' => $followers]);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
