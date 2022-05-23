<div class="post__modal--pin">
    @if (!$post->pinged)
    <button class="post__modal--element post__modal--pin" wire:click="$set('interfacePin', true)">
        <span class=" post__modal--icon material-symbols-rounded"> push_pin </span> Pingear post
    </button>
    @else
    <button class="post__modal--element post__modal--pin" wire:click="$set('interfaceUnpin', true)">
        <span class=" post__modal--icon material-symbols-rounded"> unpin </span> Unpingear post
    </button>
    @endif

    @if ($interfacePin)
        <div class="post__modal--main">
            <div class="post__modal--container">
                <div class="post__container--header">
                    ¿Desea pinear el post?
                </div>
                <div class="post__container--main">
                    <p class="post__main--warning">Esto aparecerá en la parte superior de su perfil y reemplazará cualquier Post previamente anclado.</p>
                </div>
                <div class="post__container--options">
                    <button class="post__option--element post__option--cancel" wire:click="$set('interfacePin', false)">Cancelar</button>
                    <button class="post__option--element post__option--pin" wire:click="pinPost">Pinear</button>
                </div>
            </div>
            <div class="post__modal--close" wire:click="$set('interfacePin', false)"></div>
        </div>
    @endif
    @if ($interfaceUnpin)
        <div class="post__modal--main">
            <div class="post__modal--container">
                <div class="post__container--header">
                    ¿Desea eliminar el post pingueado?
                </div>
                <div class="post__container--main">
                    <p class="post__main--warning">Esto desaparecerá de la parte superior de su perfil.</p>
                </div>
                <div class="post__container--options">
                    <button class="post__option--element post__option--cancel" wire:click="$set('interfaceUnpin', false)">Cancelar</button>
                    <button class="post__option--element post__option--delete" wire:click="unpinPost">Eliminar</button>
                </div>
            </div>
            <div class="post__modal--close" wire:click="$set('interfaceUnpin', false)"></div>
        </div>
    @endif
</div>
