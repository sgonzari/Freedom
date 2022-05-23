<div class="post__modal--remove">
    <button class="post__modal--element post__modal--delete" wire:click="$set('interfaceDelete', true)">
        <span class=" post__modal--icon material-symbols-rounded"> delete </span> Eliminar post
    </button>

    @if ($interfaceDelete)
        <div class="post__modal--main">
            <div class="post__modal--container">
                <div class="post__container--header">
                    ¿Desea eliminar el post?
                </div>
                <div class="post__container--main">
                    <p class="post__main--warning">Esto no se puede deshacer y se eliminará de tu perfil, la línea de tiempo de cualquier cuenta que te siga y de los resultados de búsqueda de Freedom.</p>
                </div>
                <div class="post__container--options">
                    <button class="post__option--element post__option--cancel" wire:click="$set('interfaceDelete', false)">Cancelar</button>
                    <button class="post__option--element post__option--report" wire:click="deletePost">Eliminar</button>
                </div>
            </div>
            <div class="post__modal--close" wire:click="$set('interfaceDelete', false)"></div>
        </div>
    @endif
</div>
