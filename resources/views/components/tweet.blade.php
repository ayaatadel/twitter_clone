@props([
    'post' => false, //default value
])

@isset($post)
    <div class="row my-2">
        <div class="row mb-3">
            <div class="d-flex align-items-center" style="justify-content: space-between;">
                <div class="col-md-10">
                    <a href="{{ route('user.profile', $post->user) }}">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ $post->user->avatar_url }}"
                                    style="border-radius: 50% ; object-fit:cover; width:100px;height:100px" alt="">
                            </div>
                            <div class="col-md-10">
                                <span>{{ $post->user->name }}</span>
                                <div class="">
                                    {{ $post->created_at }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">

                    @if (Auth::id() == $post->user_id)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link>
                                        <button type="submit">Delete</button>
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('posts.edit', $post) }}">
                                        Edit
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>

                        </form>
                    @endif
                </div>
            </div>

        </div>

        <a href={{ route('posts.show', $post) }}>
            <div class="row">
                <div class="ml-2 mt-2 mp-5">
                    {{ $post->body }}
                </div>
            </div>
            <div class="row">
                <div class="ml-2 mt-3">
                    {{-- @dump($post->images) --}}
                    @if (count($post->images) >= 1)
                        @foreach ($post->images as $img)
                            {{-- @dd($img) --}}
                            <img src="{{ asset('storage/' . $img->img_url) }}" class="rounded" width="150px"
                                alt="">
                        @endforeach
                    @endif

                </div>
            </div>
        </a>
        <div class="row ml-3 mt-3 ">
            <a class="btn btn-info btn-sm  col-1" href="{{ route('post.like', $post) }}">
                like({{ $post->likes() }})
            </a>
        </div>

        <div class="row ml-2 mt-3">
            @foreach ($post->comments as $comment)
                <x-comment :comment="$comment"></x-comment>
            @endforeach

        </div>
        {!! $slot !!}

    </div>
    <hr>
@endisset
