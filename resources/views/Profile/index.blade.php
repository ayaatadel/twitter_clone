@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="form-group">
            <div class="row">

                <div class="d-flex">
                    <div class="col-4">
                        <img src="{{ $user->avatar_url }}" width="150px" alt="">
                    </div>

                    <div class="col-4">

                        <div class="row">
                            <label class="form-label" style="border-block-color: black">{{ ucFirst($user->name) }}</label>

                            <p class="form-label">{{ $user->email }}</p>

                            <p class="form-label">{{ $user->age }}</p>

                            <p class="form-label">{{ $user->phone }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-info" href="{{ route('profile.edit', $user->id) }}">Edit</a>

                    </div>
                </div>
            </div>
            <br>


        </div>
    </div>

    <hr> <br> <br>

    <div class="row">

        @if (count($user->posts) != 0)
            @foreach ($user->posts as $post)
                <div class="row">
                    <div class="row">

                        <div class="row">

                            <div class="d-flex ">
                                <div class="col-1">

                                    <img src="{{ $post->user->avatar_url }}" class="rounded" width="150px" alt="">
                                </div>

                                {{-- <div class="mr-3"> --}}
                                <div class="col-3">

                                    <span>{{ $post->user->name }}</span>
                                </div>
                                <div class="col-2">
                                    {{ $post->created_at }}
                                </div>
                                {{-- </div> --}}
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="col-3">
                                        <div class="ml-10">


                                            <button type="submit" class="btn  btn-danger mr-2"
                                                style="color: black">Delete</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-2">

                                    <a href="/posts/{{ $post->id }}/edit" class="btn  btn-info mr-3">Edit</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <br> <br>
                <div class="row">
                    <div class="ml-2">
                        {{ $post->body }}
                    </div>


                </div>
                <br> <br>
                <div class="row">
                    <div class="ml-2">
                        <img src="{{ $post->image_url }}" class="rounded" width="150px" alt="">

                    </div>
                </div>
                <br>

                <br>
    </div>
    @endforeach
    @endif
    </div>
@endsection
