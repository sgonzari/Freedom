<div class="post">
    <div class="post__profile">
        <img class="post__profile--image" src="" alt=""/>
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
                <button>
                    <span class="material-icons"> chat_bubble </span>
                </button>
            </a>
            @livewire('repost-status', ['post' => $post], key($post->id_post))
            @livewire('like-status', ['post' => $post], key($post->id_post))
            @livewire('bookmark-status', ['post' => $post], key($post->id_post))
        </div>
    </div>
</div>
