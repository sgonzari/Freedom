<div class="post__modal--comment">
    <span class="button__action--icon button__action--default material-symbols-rounded" wire:click="$set('opened', true)"> chat_bubble </span>
    <span class="button__action--count"> {{ $post->comments()->count() }} </span>

    @if ($opened)
        <div class="post__modal--main">
            <div class="post__modal--container">
            <div class="post">
                @if (!is_null($post->fk_post))
                <a class="post__from" href="{{ route('post', ['username' => App\Models\Post::where('id_post', $post->fk_post)->first()->user()->first()->username, 'id_post' => App\Models\Post::where('id_post', $post->fk_post)->first()->id_post]) }}">
                    <span class="post__from--content">replied to {{ App\Models\Post::where('id_post', $post->fk_post)->first()->user()->first()->username }}</span>
                </a>
                @endif
                <div class="post__container">
                    <a class="post__profile" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
                        <img src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="Imagen de perfil" class="post__profile--image" />
                    </a>
                    <div class="post__main">
                        <div class="post__main--header">
                            <div class="post__header">
                                <a class="post__header--info" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
                                    <span class="post__header--name">{{ $post->user()->first()->name }}</span>
                                    <span class="post__header--username">{{ __('@') }}{{ $post->user()->first()->username }}</span>
                                </a>
                                @livewire('post-modal', ['post' => $post], key($post->id_post))
                            </div>
                        </div>
                        <div class="post__main--body">
                            <a class="post__body--content" href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
                                <p class="post__content--text">{{ $post->content }}</p>
                            </a>
                            @if (!is_null($post->image))
                                <div>
                                    {{ $post->image }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                <div class="main__container--input">
                    <form class="main__input--form" wire:submit.prevent="store">
                        <div class="main__form">
                            <div class="main__form--image">
                                <img class="form__image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}" alt="Image profile"/>
                            </div>
                            <input class="main__form--input" type="text" placeholder="Post your reply" wire:model="contentComment"/>
                        </div>
                        <button class="main__input--submit @if (!$contentComment) disabled @endif" type="submit" @if (!$contentComment) disabled @endif>Reply</button>
                    </form>
                </div>
            </div>
            <div class="post__modal--close" wire:click="$set('opened', false)"></div>
        </div>
    </div>
    @endif
</div>
