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
                    <span class="post__header--icon material-symbols-rounded"> more_horiz </span>
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
            <button class="button__action">
                <span class="button__action--icon button__action--default material-symbols-rounded"> chat_bubble </span>
                <span class="button__action--count"> {{ $post->comments()->count() }} </span>
            </button>
            @livewire('repost-status', ['post' => $post], key($post->id_post))
            @livewire('like-status', ['post' => $post], key($post->id_post))
            <button class="button__action">
                <span class="button__action--icon button__action--default material-symbols-rounded"> publish </span>
            </button>
            </div>
        </div>
    </div>
</div>