@props([
    'comment' => false,
])
@isset($comment)
    <div class="row ml-2 mt-3">
        <p class="col-4"> {{ $comment->body }}</p>
        <p class="col-2">{{ $comment->user->name }}</p>
    </div>
@endisset
