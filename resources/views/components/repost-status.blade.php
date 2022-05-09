<div>
    @if (!Auth::user()->reposts()->find($this->post->id_post))
        <button wire:click="addRepost">Dar repost {{ $post->reposts()->count() }}</button>
    @else
        <button wire:click="deleteRepost">Dejar repost {{ $post->reposts()->count() }}</button>
    @endif
</div>
