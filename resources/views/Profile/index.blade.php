@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="form-group">
            <div class="row">

                <div class="d-flex">
                    <div class="col-4">
                        <img src="{{ $user->avatar_url }}" width="150px" alt="">
                    </div>

                    <div class="col-4">

                        <div class="row">
                            <label class="form-label" style="border-block-color: black"> {{ ucFirst($user->name) }}</label>

                            <p class="form-label">{{ $user->email }}</p>

                            <p class="form-label">{{ $user->age }}</p>

                            <p class="form-label">{{ $user->phone }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-info" href="{{ route('profile.edit', $user->id) }}">Edit</a>

                    </div>
                </div>
            </div>
            <br>


        </div>





    </div>




    <hr>

    <div class="row">
        <div>


        </div>




    </div>
@endsection
