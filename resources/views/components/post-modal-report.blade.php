<div class="post__modal--report">
    <button class="post__modal--element post__modal--delete" wire:click="$set('interfaceReport', true)">
        <span class=" post__modal--icon material-symbols-rounded"> report </span> Informar post
    </button>

    @if ($interfaceReport)
        <div class="post__modal--main">
            <div class="post__modal--container">
                <div class="post__container--header">
                    Informar el post de {{ $post->user()->first()->name }}
                </div>
                <form class="post__container--form" wire:submit.prevent="reportPost">
                    <div class="post__form--body">
                        <div class="post__body--image">
                            <img class="post__image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}" alt="Imagen de perfil" />
                        </div>
                        <input class="post__body--input" placeholder="Write your report" name="message" wire:model="reason" type="text" autofocus>
                    </div>
                </form>
                <div class="post__container--options">
                    <button class="post__option--element post__option--cancel" wire:click="$set('interfaceReport', false)">Cancelar</button>
                    <button class="post__option--element post__option--report @if (!$reason) disabled @endif" wire:click="reportPost" @if (!$reason) disabled @endif>Reportar</button>
                </div>
            </div>
            <div class="post__modal--close" wire:click="$set('interfaceReport', false)"></div>
        </div>
    @endif
</div>
