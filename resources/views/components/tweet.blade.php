{{-- <h1>Tweet</h1> --}}

@props([
    'post' => false,
])

@isset($post)
    <div class="row">
        <div class="row">

            <div class="row mb-3">

                <div class="d-flex align-items-center">
                    <div class="col-1 mr-2">

                        <img src="{{ $post->user->avatar_url }}"
                            style="border-radius: 50% ; object-fit:cover; width:100px;height:100px" alt="">

                    </div>


                    <div class="col-3">

                        <span>{{ $post->user->name }}</span>
                    </div>
                    <div class="col-5">
                        {{ $post->created_at }}
                    </div>
                    @if (Auth::id() == $post->user_id)
                        <div class="col-1">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger mr-2" style="color: black">Delete</button>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-info mr-3">Edit</a>
                        </div>
                        </form>
                    @endif
                </div>
            </div>

        </div>
        <div class="row">
            <div class="ml-2 mt-2 mp-5">
                {{ $post->body }}
            </div>
        </div>
        <div class="row">
            <div class="ml-2 mt-3">
                {{-- @dump($post->image_url) --}}
                <img src="{{ $post->image_url }}" class="rounded" width="150px" alt="">
            </div>
        </div>
        <br>
        {!! $slot !!}
        <br>
    </div>
    {{-- <div class="row">
        <div class="row">
            <div class="d-flex justify-between">
                <a href=" {{ route('user.profile', $post->user) }}">

                    <div class="d-flex">

                        <img src="{{ $post->user->avatar_url }}"
                            style="border-radius: 50% ; object-fit:cover; width:100px;height:100px" alt=""
                            class="rounded" width="50px" alt="">
                        <div class="">
                            <div class="mr-2">
                                <span>{{ $post->user->name }}</span>
                            </div>

                        </div>
                    </div>
                </a>

                @if (Auth::id() == $post->user_id)
                    <div class="d-flex">


                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" style="color: black" class="btn btn-danger mr-2">Delete</button>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-info mr-3">Edit</a>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="ml-2">
                {{ $post->body }}
            </div>

        </div>
        <div class="row">
            <div class="ml-2">
                <img src="{{ $post->image_url }}" class="rounded" width="300px" alt="">

            </div>
        </div>
        <br>
        <div class="row">
            <div class="ml-2">
                {{ $post->created_at }}
            </div>
        </div>
        <br>
    </div> --}}
@endisset
<hr> <br>
