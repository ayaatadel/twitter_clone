@props([
    'post' => false, //default value
])

@isset($post)


    <div class="tweet-wrap">
        <div class="tweet-header row">
            <div class="col-md-1">
                <a href="{{ route('user.profile', $post->user) }}">
                    <img src="{{ $post->user->avatar_url }}" alt="" class="avator" />
                </a>
            </div>
            <div class="col-md-11 tweet-header-info d-flex">
                <div class="col-md-11">
                    <a href="{{ route('user.profile', $post->user) }}">
                        {{ $post->user->name }} <span>{{ optional($post->created_at)->diffForHumans() }} </span>
                    </a>
                    <a href={{ route('posts.show', $post) }}>
                        <p>
                            {{ $post->body }}
                        </p>
                    </a>
                </div>
                <div class="col-md-1">

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
        <div class="tweet-img-wrap">
            <a href={{ route('posts.show', $post) }}>
                <div class="container">
                    <div class="row">
                        @foreach ($post->images as $image)
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $image->img_url) }}" alt="" class="tweet-img" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </a>
        </div>
        <div class="tweet-info-counts">
            <a href={{ route('posts.show', $post) }}>
                <div class="comments">
                    <svg class="feather feather-message-circle sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path
                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                        </path>
                    </svg>
                    <div class="comment-count">{{ count($post->comments) }}</div>
                </div>
            </a>
            <a href="{{ route('post.retweet', $post) }}">
                <div class="retweets ">
                    <svg class="
                @if (App\Models\Retweets::where('user_id', $post->user->id)->where('post_id', $post->id)->first() != null) text-info @endif
                feather feather-repeat sc-dnqmqq jxshSx"
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <polyline points="17 1 21 5 17 9"></polyline>
                        <path d="M3 11V9a4 4 0 0 1 4-4h14"></path>
                        <polyline points="7 23 3 19 7 15"></polyline>
                        <path d="M21 13v2a4 4 0 0 1-4 4H3"></path>
                    </svg>
                    <div class="retweet-count">{{ count($post->retweets) }}</div>
                </div>
            </a>
            <div class="likes">
                <a href="{{ route('post.like', $post) }}">
                    <svg class="
                    @if (\App\Models\Like::where('user_id', auth()->user()->id)->where('post_id', $post->id)->first() != null) text-danger @endif
                        feather feather-heart sc-dnqmqq jxshSx"
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg>
                </a>
                <div class="likes-count">{{ $post->likes() }}</div>
            </div>

        </div>
        <div class="row ml-2 mt-3">
            @foreach ($post->comments as $comment)
                <x-comment :comment="$comment"></x-comment>
            @endforeach

        </div>
    </div>

@endisset
