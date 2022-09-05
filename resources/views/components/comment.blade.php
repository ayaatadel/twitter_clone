@props([
    'comment' => false,
])
@isset($comment)
    <div class="tweet-wrap">
        <div class="tweet-header row">
            <div class="col-md-1">
                <img src="{{ $comment->user->avatar_url }}" alt="" class="avator" />
            </div>
            <div class="col-md-11 tweet-header-info d-flex">
                <div class="col-md-11">
                    {{ $comment->user->name }} <span>{{ optional($comment->created_at)->diffForHumans() }} </span>
                    <p>
                        {{ $comment->body }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row ml-2 mt-3">
        <p class="col-4"> {{ $comment->body }}</p>
        <p class="col-2">{{ $comment->user->name }}</p>
    </div> --}}
@endisset
