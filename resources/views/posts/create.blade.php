@extends('layouts.app')
@section('content')
    <br>
    <div class="form-group">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class='form-control'> Post Body </label>
            <br>
            <textarea name="body" class="form-control"></textarea><br>
            <div class='form-group'>
                <input type='file' name="image">
                <button class="btn btn-primary" style="color: black" type="submit"> Post</button>
            </div>
        </form>
    @endsection
