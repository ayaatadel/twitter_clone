@extends('layouts.app')

@section('content')
    <div class="row">
        @if (count($posts) >= 1)
            @foreach ($posts as $post)
                <div class="row">
                    <div class="row">
                        <div class="d-flex justify-between">

                            <div class="d-flex ">

                                <img src="{{ $post->user->avatar_url }}" class="rounded" width="50px" alt="">
                                <div class="">
                                    <div class="mr-2">
                                        <span>{{ $post->user->name }}</span>
                                    </div>

                                </div>
                            </div>
                            <a href="{{ route('posts.create') }}" class="btn  btn-info ml-3">Tweet</a>

                            @if (Auth::id() == $post->user_id)
                                <div class="d-flex">


                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="color: black"
                                            class="btn btn-danger mr-2">Delete</button>
                                    </form>

                                    <a href="/posts/{{ $post->id }}/edit" class="btn  btn-info">Edit</a>

                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="ml-2">
                            {{ $post->body }}
                        </div>

                    </div>
                    <div class="row">
                        <div class="ml-2">
                            <img src="{{ $post->image_url }}" class="rounded" width="300px" alt="">

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="ml-2">
                            {{ $post->created_at }}
                        </div>
                    </div>
                    <br>
                </div>
                <hr> <br>
            @endforeach
        @else
            <h1> there is no posts</h1>
        @endif
    </div>
@endsection
