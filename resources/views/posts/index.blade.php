@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">


            <a href="{{ route('posts.create') }}" class="btn btn-info ml-12 mb-2">Tweet</a>
        </div>
        @if (count($posts) >= 1)
            @foreach ($posts as $post)
                <x-tweet :post="$post" />
            @endforeach
        @else
            <h1> there is no posts</h1>
        @endif
    </div>
@endsection
