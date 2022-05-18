<div>
    <div class="parents__posts">
        @foreach ($fromPosts as $fromPost)
            @livewire('post-component', ['post' => $fromPost], key($fromPost->id_post))
        @endforeach
    </div>

    <div class="comment">
        <div class="comment__profile">
            <a href="{{ route('profile', ['username' => $post->user()->first()->username]) }}" class="comment__profile--image">
                <img src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="Imagen de perfil" class="comment__image">
            </a>
            <a href="{{ route('profile', ['username' => $post->user()->first()->username]) }}" class="comment__profile--info">
                <h2 class="comment__info--name">{{ $user->name }}</h2>
                <span class="comment__info--username">{{ $user->username }}</span>
            </a>
            @livewire('post-modal', ['post' => $post], key($post->id_post))
        </div>
        <div class="comment__main">
            <div class="comment__main--body">
                <div class="comment__body--content">
                    <p class="comment__content--text">{{ $post->content }}</p>
                </div>
                @if (!is_null($post->images))
                    <div class="comment__body--image"></div>
                @endif
            </div>
            <div class="comment__main--footer">
                @livewire('post-modal-comment', ['post' => $post])
                @livewire('repost-status', ['post' => $post])
                @livewire('like-status', ['post' => $post])
                @livewire('post-modal-publish', ['post' => $post])
            </div>
        </div>
    </div>

    <div class="comment__create">
        <form class="comment__create--form" wire:submit.prevent="store">
            <div class="comment__form--body">
                <div class="comment__body--image">
                    <img src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="Imagen de perfil" class="comment__image" />
                </div>
                <input type="text" class="comment__body--input" placeholder="Post your reply" wire:model="commentText" />
            </div>
            <div class="comment__form--footer">
                <button class="comment__footer--submit @if (!$commentText) disabled @endif" type="submit">Reply</button>
            </div>
        </form>
    </div>

    <div class="comment__list">
        @foreach ($comments as $comment)
            @livewire('post-component', ['post' => $comment], key($comment->id_post))
        @endforeach
    </div>
</div>
