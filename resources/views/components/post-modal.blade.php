<div class="post__modal">
    <span class="post__header--icon material-symbols-rounded" wire:click="$set('opened', true)"> more_horiz </span>

    @if ($opened)
        <div class="post__modal--container">
            <button class="post__modal--element" wire:click="">Añadir bookmark</button>
            <button class="post__modal--element" wire:click="">Eliminar bookmark</button>
            <button class="post__modal--element" wire:click="">Eliminar post</button>
        </div>
        <div class="post__modal--close" wire:click="$set('opened', false)"></div>
    @endif
</div>
