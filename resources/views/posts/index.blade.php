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
        <x-tweet-form />
    </div>
    @forelse ($posts as $post)
        <x-tweet :post="$post"></x-tweet>
    @empty
        <h1> there is no posts</h1>
    @endforelse

@endsection
