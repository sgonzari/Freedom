<div class="post__modal">
    <span class="post__header--icon material-symbols-rounded" wire:click="$set('opened', true)"> more_horiz </span>

    @if ($opened)
        <div class="post__modal--container">
            @if (Auth::user()->id_user == $post->user()->first()->id_user)
                @livewire('post-modal-pin', ['post' => $post])
            @endif
            @if (Auth::user()->reports()->where('fk_post', $post->id_post)->count() < 1)
                @livewire('post-modal-report', ['post' => $post])
            @endif
            @if ((Auth::user()->id_user == $post->user()->first()->id_user) OR (Auth::user()->fk_rol > 1))
                @livewire('post-delete', ['post' => $post])
            @endif
        </div>
        <div class="post__modal--close" wire:click="$set('opened', false)"></div>
    @endif
</div>
