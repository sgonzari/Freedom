<div class="image">
    <div class="image__post" wire:click="$set('interfaceImage', true)">
       <img loading="lazy" class="post__image" src="{{ asset('storage/'.$post->image) }}" alt="{{ __('image.Posts image') }}">
    </div>

    @if ($interfaceImage)
        <div class="image__interface">
            <div class="image__interface--container">
                <div class="image__container--left">
                    <span class="image__left--icon material-symbols-rounded" wire:click="$set('interfaceImage', false)"> close </span>
                    <div class="image__left--image">
                        <img loading="lazy" class="image__image" src="{{ asset('storage/'.$post->image) }}" alt="{{ __('image.Posts image') }}">
                    </div>
                    <div class="image__left--options">
                        @livewire('post-modal-comment', ['post' => $post])
                        @livewire('repost-status', ['post' => $post])
                        @livewire('like-status', ['post' => $post])
                        @livewire('post-modal-publish', ['post' => $post])
                    </div>
                    <div class="image__left--close" wire:click="$set('interfaceImage', false)"></div>
                </div>
                <div class="image__container--right">
                    <livewire:post-view :post="$post" :user="$user"/>
                </div>
            </div>
        </div>
    @endif
</div>
