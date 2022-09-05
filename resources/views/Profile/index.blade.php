@extends('layouts.app')
@section('content')


    <div class='row  mb-1 mt-1'>
        <div class="form-group">
            <div class="row">

                <div class="d-flex align-items-center">
                    <div class="row mb-1">
                        <div class="col-6">
                            <img src="{{ $user->avatar_url }}"
                                style="border-radius: 50% ; object-fit:cover; width:100px;height:100px" alt="">
                        </div>
                        @if (Auth::id() != $user->id)
                            <div class="col-4">
                                <a class="btn btn-info" href="{{ route('user.makeFollow', $user) }}">
                                    {{ $text }}
                                </a>
                            </div>
                        @endif
                        <div class="row mt-1 mb-2 d-flex">

                            <div class="col-2 mx-2 ml-2 ">


                                <a href="{{ route('user.follow', $user) }}"> following</a>
                            </div>

                            <div class="col-1 mx-1 ml-1 ">
                                <p>
                                    {{ count($user->following) }}
                                </p>
                            </div>
                            <div class="col-2 mx-2 ml-2 ">

                                <a href="{{ route('user.followers', $user) }}">
                                    followers</a>
                            </div>
                            <div class="col-1 mx-1 ml-1 ">

                                <p> {{ count($user->followers) }} </p>
                            </div>
                        </div>

                    </div>

                    <div class="col-5">


                        <label class="form-label" style="border-block-color: black">{{ ucFirst($user->name) }}</label>

                        <p class="form-label">{{ $user->email }}</p>

                        <p class="form-label">{{ $user->age }}</p>

                        <p class="form-label">{{ $user->phone }}</p>

                    </div>


                    @if (Auth::id() == $user->id)
                        <div class="col-3 ml-5">
                            <a class="btn btn-info" href="{{ route('profile.edit', $user->id) }}">Edit</a>

                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>





    <hr>

    <div class="row mt-4">
        @if (count($posts) != 0)
            @foreach ($posts as $post)
                <x-tweet :post="$post"></x-tweet>
            @endforeach
        @endif
    </div>
    {{-- @endif --}}
@endsection
