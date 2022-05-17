<div>
    <div class="post">
        <a class="post__profile" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
            <img src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="Imagen de perfil" class="post__profile--image" />
        </a>
        <div class="post__main">
            <div class="post__main--header">
                <div class="post__header">
                    <a class="post__header--name" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">{{ $post->user()->first()->name }}
                        <span class="post__header--username">{{ __('@') }}{{ $post->user()->first()->username }}</span>
                    </a>
                    @livewire('post-modal', ['post' => $post], key($post->id_post))
                </div>
            </div>
            <a class="post__main--body" href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
                <div class="post__body--content">
                    <p class="post__content--text">{{ $post->content }}</p>
                </div>
                @if (!is_null($post->images))
                    <div class="post__body--image"></div>
                @endif
            </a>
            <div class="post__main--footer">
                @livewire('post-modal-comment', ['post' => $post], key($post->id_post))
                @livewire('repost-status', ['post' => $post], key($post->id_post))
                @livewire('like-status', ['post' => $post], key($post->id_post))
                @livewire('post-modal-publish', ['post' => $post], key($post->id_post))
            </div>
        </div>
    </div>
</div>