@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="d-flex">
            <div class="form-group">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('profile.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input name="name" class="form-control" value="{{ $user->name }}"> <br>
                    <input type="file" name="avatar" value="{{ $user->avatar_url }}">
                    <img src="{{ $user->avatar_url }}">
                    <br>
                    <input type="date" class="form-control" name="age" value="{{ $user->age }}">
                    <input class="form-control" name="phone" value="{{ $user->phone }} ">
                    <input class="form-control" name="email" value="{{ $user->email }} ">
                    {{-- <textarea class="form-contrller" name="user_password">{{ $user->password}}</textarea> --}}
                    <button class="btn btn-info" type="submit">Update</button>
                    <a class="btn  btn-info" href="{{ route('profile.index') }}">Back</a>


                </form>
            </div>
        </div>
    </div>
@endsection
