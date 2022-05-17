<div class="post__modal">
    <span class="post__header--icon material-symbols-rounded" wire:click="$set('opened', true)"> more_horiz </span>

    @if ($opened)
        <div class="post__modal--container">
            @livewire('post-delete', ['post' => $post], key($post->id_post))
        </div>
        <div class="post__modal--close" wire:click="$set('opened', false)"></div>
    @endif
</div>
