@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center">
        {{-- @dd($follow) --}}
        @if (count($following) >= 1)
            @foreach ($following as $follow)
                <x-follow :user="$follow"> </x-follow>
            @endforeach
        @endif
    @endsection
