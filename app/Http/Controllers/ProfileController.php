<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //  dd($request->avatar, $request->name, $request->age);

        $validated = $this->validate($request, [
            'name' => 'required',
            "avatar" => "nullable",
            'age' => 'required',
            'phone' => 'nullable',
            'email' => 'required'

        ]);
        // dd($user);
        $user->name = $request->input('name');
        $user->age = $request->input('age');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');

        if ($request->avatar) {
            // if (File::exist($user->avatar_url)) {
            //     File::delete($user->avatar_url);
            // }
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $name = $request->file('avatar')->getClientOriginalName();
            $avatar_name = $name . '.' . $extension;
            Storage::disk('public')->putFileAs(
                'avatars/',
                $request->file('avatar'),
                $avatar_name
            );

            $user->avatar = $avatar_name;
        }
        $user->save();
        return redirect()->route('profile.index')->with('success', 'profile Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //$user->delete();

    }
}
