<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

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
        return view('Profile.index')->with('user', $user);
        //  if(Auth::id()==)
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
