<div>
    @if (!Auth::user()->bookmarks()->find($this->post->id_post))
        <button wire:click="addBookmark"><span class="material-icons"> bookmark_added </span></button>
    @else
        <button wire:click="deleteBookmark"><span class="material-icons"> bookmark_remove </span></button>
    @endif
</div>
