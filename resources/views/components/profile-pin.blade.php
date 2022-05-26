<div>
    <div class="post">
        <a class="post__from" href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
            <span class="post__from--content post__from--pin"><span class=" post__modal--icon material-symbols-rounded"> push_pin </span>{{ __('profile.Pinned post') }}</span>
        </a>
        <div class="post__container">
            <a class="post__profile" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
                <img src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="{{ __('image.Profiles image') }}" class="post__profile--image" />
            </a>
            <div class="post__main">
                <div class="post__main--header">
                    <div class="post__header">
                        <a class="post__header--info" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
                            <span class="post__header--name">{{ $post->user()->first()->name }}</span>
                            <span class="post__header--username">{{ __('@') }}{{ $post->user()->first()->username }}</span>
                        </a>
                        @livewire('post-modal', ['post' => $post])
                    </div>
                </div>
                <div class="post__main--body">
                    <a class="post__body--content" href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
                        <p class="post__content--text">{{ $post->content }}</p>
                    </a>
                    @if (!is_null($post->image))
                        @livewire('image-view', ['post' => $post])
                    @endif
                </div>
                <div class="post__main--footer">
                    @livewire('post-modal-comment', ['post' => $post])
                    @livewire('repost-status', ['post' => $post])
                    @livewire('like-status', ['post' => $post])
                    @livewire('post-modal-publish', ['post' => $post])
                </div>
            </div>
        </div>
    </div>
</div>
