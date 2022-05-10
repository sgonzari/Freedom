<div>
    @if (!Auth::user()->reposts()->find($this->post->id_post))
        <button wire:click="addRepost"><span class="material-icons"> repeat </span> {{ $post->reposts()->count() }}</button>
    @else
        <button wire:click="deleteRepost"><span class="material-icons"> repeat </span> {{ $post->reposts()->count() }}</button>
    @endif
</div>
