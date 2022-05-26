<div class="post__modal--remove">
    <button class="post__modal--element post__modal--delete" wire:click="$set('interfaceDelete', true)">
        <span class=" post__modal--icon material-symbols-rounded"> delete </span> {{ __('post.Delete post') }}
    </button>

    @if ($interfaceDelete)
        <div class="post__modal--main">
            <div class="post__modal--container">
                <div class="post__container--header">
                {{ __('post.Do you want delete this post?') }}
                </div>
                <div class="post__container--main">
                    <p class="post__main--warning">{{ __('post.Delete Advice') }}</p>
                </div>
                <div class="post__container--options">
                    <button class="post__option--element post__option--cancel" wire:click="$set('interfaceDelete', false)">{{ __('post.Cancel') }}</button>
                    <button class="post__option--element post__option--report" wire:click="deletePost">{{ __('post.Delete') }}</button>
                </div>
            </div>
            <div class="post__modal--close" wire:click="$set('interfaceDelete', false)"></div>
        </div>
    @endif
</div>
