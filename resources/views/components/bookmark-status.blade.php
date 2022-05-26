<div>
    @if (!Auth::user()->bookmarks()->find($this->post->id_post))
        <button class="post__modal--element" wire:click="addBookmark"><span class=" post__modal--icon material-symbols-rounded"> bookmark_added </span>{{ __('bookmark.Add bookmark') }}</button>
    @else
        <button class="post__modal--element" wire:click="deleteBookmark"><span class=" post__modal--icon material-symbols-rounded"> bookmark_remove </span>{{ __('bookmark.Delete bookmark') }}</button>
    @endif
</div>
