@extends('layouts.app')

@section('content')
    <x-tweet :post="$post"></x-tweet>
    <form action={{ route('post.comment') }} method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="row">
            <div class="col-md-11">
                <input class="form-control" type="text" name="body" placeholder="Comment..">
            </div>
            <button class=" col-md-1 btn btn-info" type="submit">Reply</button>
        </div>
    </form>
@endsection
