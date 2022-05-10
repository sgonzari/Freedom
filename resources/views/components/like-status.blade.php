<div>
    @if (!Auth::user()->likes()->find($this->post->id_post))
        <button wire:click="addLike"><span class="material-icons"> favorite_border </span> {{ $post->likes()->count() }}</button>
    @else
        <button wire:click="deleteLike"><span class="material-icons"> favorite_border </span> {{ $post->likes()->count() }}</button>
    @endif
</div>
