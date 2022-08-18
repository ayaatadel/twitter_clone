@extends('layouts.app')
@section('content')
    <div class='row  mb-1 mt-1'>
        <div class="form-group">
            <div class="row">

                <div class="d-flex align-items-center">
                    <div class="col-4">
                        <img src="{{ $user->avatar_url }}"
                            style="border-radius: 50% ; object-fit:cover; width:100px;height:100px" alt="">
                    </div>

                    <div class="col-5">

                        <div class="row">
                            <label class="form-label" style="border-block-color: black">{{ ucFirst($user->name) }}</label>

                            <p class="form-label">{{ $user->email }}</p>

                            <p class="form-label">{{ $user->age }}</p>

                            <p class="form-label">{{ $user->phone }}</p>
                        </div>
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
        @if (count($user->posts) != 0)
            @foreach ($user->posts as $post)
                <x-tweet :post="$post"></x-tweet>
            @endforeach
        @endif
    </div>
@endsection
