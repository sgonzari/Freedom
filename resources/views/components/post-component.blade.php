<div class="post">
    <div class="post__profile">
        <img class="post__profile--image" src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="Image profile"/>
    </div>
    <div class="post__main">
        <div class="post__main--header">
            <div class="post__header">
                <h3 class="post__header--name">{{ $post->user()->first()->name }}
                    <span class="post__header--username">{{ __('@') }}{{ $post->user()->first()->username }}</span>
                </h3>
            </div>
        </div>
        <div class="post__main--body">
            <div class="post__body--content">
                <p class="post__content--text">{{ $post->content }}</p>
            </div>
            @if (!is_null($post->images))
                <div class="post__body--image">
                    post__body--image
                </div>
            @endif
        </div>
        <div class="post__main--footer">
            <a href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
                <button class="button__action">
                <span class="button__action--icon material-symbols-rounded"> chat_bubble </span>
                <span class="button__action--count"> {{ $post->comments()->count() }} </span>
                </button>
            </a>
            @livewire('repost-status', ['post' => $post], key($post->id_post))
            @livewire('like-status', ['post' => $post], key($post->id_post))
            <button class="button__action">
                <span class="button__action--icon material-symbols-rounded"> publish </span>
            </button>
         {{-- @livewire('bookmark-status', ['post' => $post], key($post->id_post)) --}}
        </div>
    </div>
</div>
