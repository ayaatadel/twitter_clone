@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center">
        {{-- @dd($follow) --}}
        @if (count($followers) >= 1)
            @foreach ($followers as $follower)
                <x-follow :user="$follower"> </x-follow>
            @endforeach
        @endif
    @endsection
