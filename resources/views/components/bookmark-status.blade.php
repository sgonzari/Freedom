<div>
    @if (!Auth::user()->bookmarks()->find($this->post->id_post))
        <button wire:click="addBookmark">Guardar</button>
    @else
        <button wire:click="deleteBookmark">Dejar de guardar</button>
    @endif
</div>
