<div>
    <div class="parents__posts">
        @foreach ($fromPosts as $fromPost)
            @if (!$fromPost->trashed())
                @livewire('post-component', ['post' => $fromPost], key($fromPost->id_post))
            @else
                Este post fue eliminado.
            @endif
        @endforeach
    </div>

    @if (!$post->trashed())
        <div class="comment" id="comment">
            <div class="comment__profile">
                <a href="{{ route('profile', ['username' => $post->user()->first()->username]) }}" class="comment__profile--image">
                    <img src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="Imagen de perfil" class="comment__image">
                </a>
                <a href="{{ route('profile', ['username' => $post->user()->first()->username]) }}" class="comment__profile--info">
                    <h2 class="comment__info--name">{{ $user->name }}</h2>
                    <span class="comment__info--username">{{ __('@') }}{{ $user->username }}</span>
                </a>
                @livewire('post-modal', ['post' => $post])
            </div>
            <div class="comment__main">
                <div class="comment__main--body">
                    <div class="comment__body--content">
                        <p class="comment__content--text">{{ $post->content }}</p>
                    </div>
                    @if (!is_null($post->image))
                        <div class="comment__body--image">
                            <img class="comment__image" src="http://localhost/freedom/public/storage/{{ $post->image }}" alt="Imagen del post">
                        </div>
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
                    <a class="comment__body--image" href="{{ route('profile', ['username' => Auth::user()->username]) }}">
                        <img src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}" alt="Imagen de perfil" class="comment__image" />
                    </a>
                    <div class="comment__body--container">
                        <textarea class="comment__container--input" name="commentText" id="commentText" placeholder="What's happening?" wire:model="commentText"></textarea>                    
                        @if ($commentImage)
                            <div class="comment__container--image">
                                <span class="container__icon material-symbols-rounded" wire:click="$set('commentImage', null)"> close </span>
                                <img class="container__image" src="{{ $commentImage->temporaryUrl() }}" alt="Imagen subida">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="comment__form--footer">
                    <div class="comment__footer--container">
                        <label for="uploadImageComment">
                            <span class="main__button--icon material-symbols-rounded">image</span>
                        </label>
                        <input class="main__button--element main__button--image" id="uploadImageComment" type="file" wire:model="commentImage" />
                        @error($commentImage)
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="comment__footer--submit @if ((!$commentText) AND (!$commentImage)) disabled @endif" type="submit" @if ((!$commentText) AND (!$commentImage)) disabled @endif>Reply</button>
                </div>
            </form>
        </div>

        <div class="comment__list">
            @foreach ($comments as $comment)
                @livewire('post-component', ['post' => $comment], key($comment->id_post))
            @endforeach
        </div>
    @else
        Este post fue eliminado.
    @endif
</div>
