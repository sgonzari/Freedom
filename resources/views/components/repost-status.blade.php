<div>
    @if (!Auth::user()->reposts()->find($this->post->id_post))
        <button class="button__action" wire:click="addRepost">
            <span class="button__action--icon button__action--repost material-symbols-rounded"> repeat </span> {{ $post->reposts()->count() }}
        </button>
    @else
        <button class="button__action" wire:click="deleteRepost">
            <span class="button__action--icon button__action--repost reposted material-symbols-rounded"> repeat </span> {{ $post->reposts()->count() }}
        </button>
    @endif
</div>
