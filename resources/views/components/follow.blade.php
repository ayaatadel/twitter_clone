@props([
    'user' => false,
])

@isset($user)
    <div class="row mb-1 mt-1">
        <div class="col-4">
            <img src="{{ $user->avatar_url }}" style="border-radius: 50% ; object-fit:cover; width:100px;height:100px"
                alt="">
        </div>

        <div class="col-3">

            <label class="form-label" style="border-block-color: black">{{ ucFirst($user->name) }}</label>

        </div>
        {!! $slot !!}
    </div>
@endisset
