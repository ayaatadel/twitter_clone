@extends('layouts.app')

@section('content')
    <x-tweet :post="$post"></x-tweet>
    <form action={{ route('post.comment') }} method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="text" name="body" placeholder="Comment..">
        <button type="submit">Reply</button>
    </form>
@endsection
