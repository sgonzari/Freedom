<div class="post__modal--publish">
    <span class="button__action--icon button__action--default material-symbols-rounded" wire:click="$set('opened', true)">  publish  </span>

    @if ($opened)
        <div class="post__modal--container">
            @livewire('bookmark-status', ['post' => $post], key($post->id_post))
        </div>
        <div class="post__modal--close" wire:click="closeModal"></div>
    @endif
</div>
