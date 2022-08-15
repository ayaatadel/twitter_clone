@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="d-flex">
            <div class='form-group'>
                <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label>Post Body</label><br>
                    <textarea name="body" class='form-control'>{{ $post->body }} </textarea> <br>
                    <input type='file' name="image">
                    <button class="btn btn-info" type="submit">Update</button>
                    <a class="btn  btn-info" href="{{ route('posts.index') }}">Back</a>

                </form>
            </div>
        </div>
    </div>
@endsection
