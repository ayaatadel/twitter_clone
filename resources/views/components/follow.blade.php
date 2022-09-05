@props([
    'user' => false,
])

@isset($user)
    {{-- <div class="row mb-1 mt-1">
        <div class="col-4">
            <img src="{{ $user->avatar_url }}" style="border-radius: 50% ; object-fit:cover; width:100px;height:100px"
                alt="">
        </div>

        <div class="col-3">

            <label class="form-label" style="border-block-color: black">{{ ucFirst($user->name) }}</label>

        </div>
        {!! $slot !!}
    </div> --}}


    <div class="tweet-header row">
        <a href="{{ route('user.profile', $user) }}">
            <div class="col-md-1">

                <img src="{{ $user->avatar_url }}" alt="" class="avator"
                    style="border-radius: 50% ; object-fit:cover; width:800px;height:100px" />
            </div>

            <div class="col-md-11 tweet-header-info d-flex">
                <div class="col-md-11">
                    <label class="form-label" style="border-block-color: black">{{ ucFirst($user->name) }}</label>
        </a>


    </div>
    {!! $slot !!}
@endisset
