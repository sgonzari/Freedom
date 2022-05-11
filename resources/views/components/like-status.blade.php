<div>
    @if (!Auth::user()->likes()->find($this->post->id_post))
        <button class="button__action" wire:click="addLike">
            <span class="button__action--icon material-symbols-rounded"> favorite_border </span> 
            <span class="button__action--count">{{ $post->likes()->count() }}</span>
        </button>
    @else
        <button class="button__action" wire:click="deleteLike">
            <span class="button__action--icon liked material-symbols-rounded"> favorite_border </span>
            <span class="button__action--count">{{ $post->likes()->count() }}</span>
        </button>
    @endif
</div>
