<div>
    @if (!Auth::user()->likes()->find($this->post->id_post))
        <button wire:click="addLike">Dar like {{ $post->likes()->count() }}</button>
    @else
        <button wire:click="deleteLike">Dejar like {{ $post->likes()->count() }}</button>
    @endif
</div>
