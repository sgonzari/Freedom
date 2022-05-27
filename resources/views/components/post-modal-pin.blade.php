<div class="post__modal--pin">
    @if (!$post->pinged)
    <button class="post__modal--element post__modal--pin" wire:click="$set('interfacePin', true)">
        <span class=" post__modal--icon material-symbols-rounded"> push_pin </span> {{ __('post.Pin post') }}
    </button>
    @else
    <button class="post__modal--element post__modal--pin" wire:click="$set('interfaceUnpin', true)">
        <span class=" post__modal--icon material-symbols-rounded"> clear </span> {{ __('post.Unpin post') }}
    </button>
    @endif

    @if ($interfacePin)
        <div class="post__modal--main">
            <div class="post__modal--container">
                <div class="post__container--header">
                {{ __('post.Do you want pin this post?') }}
                </div>
                <div class="post__container--main">
                    <p class="post__main--warning">{{ __('post.Pin Advice') }}</p>
                </div>
                <div class="post__container--options">
                    <button class="post__option--element post__option--cancel" wire:click="$set('interfacePin', false)">{{ __('post.Cancel') }}</button>
                    <button class="post__option--element post__option--pin" wire:click="pinPost">{{ __('post.Pin') }}</button>
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
