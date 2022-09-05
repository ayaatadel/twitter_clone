@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="d-flex">
            <div class='form-group'>
                <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label>Post Body</label><br>
                    <textarea name="body" class='form-control'>{{ $post->body }} </textarea> <br>
                    <input type='file' name="images[]" multiple>
                    {{-- <input type="file" name="img" > --}}
                    <button class="btn btn-info" type="submit">Update</button>
                    <a class="btn  btn-info" href="{{ route('posts.index') }}">Back</a>

                </form>
            </div>
        </div>
    </div>
@endsection
