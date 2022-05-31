<div class="post__modal--comment">
    <span class="button__action--icon button__action--default material-symbols-rounded" wire:click="$set('opened', true)"> chat_bubble </span>
    <span class="button__action--count"> {{ $post->comments()->count() }} </span>

    @if ($opened)
        <div class="post__modal--main">
            <div class="post__modal--container">
                <div class="post">
                    @if (!is_null($post->fk_post))
                    <a class="post__from" href="{{ route('post', ['username' => App\Models\Post::withTrashed()->where('id_post', $post->fk_post)->first()->user()->first()->username, 'id_post' => App\Models\Post::withTrashed()->where('id_post', $post->fk_post)->first()->id_post]) }}">
                        <span class="post__from--content">replied to {{ App\Models\Post::withTrashed()->where('id_post', $post->fk_post)->first()->user()->first()->username }}</span>
                    </a>
                    @endif
                    <div class="post__container">
                        <a class="post__profile" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
                            <img loading="lazy" src="{{ asset('storage/'.$post->user()->first()->profile_image) }}" alt="{{ __('image.Profiles image') }}" class="post__profile--image" />
                        </a>
                        <div class="post__main">
                            <div class="post__main--header">
                                <div class="post__header">
                                    <a class="post__header--info" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
                                        <span class="post__header--name">{{ $post->user()->first()->name }}</span>
                                        <span class="post__header--username">{{ __('@') }}{{ $post->user()->first()->username }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="post__main--body">
                                <a class="post__body--content" href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
                                    <p class="post__content--text">{{ $post->content }}</p>
                                </a>
                                @if (!is_null($post->image))
                                    <div class="post__body--image">
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
                                <img loading="lazy" class="form__image" src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="{{ __('image.Profiles image') }}"/>
                            </div>
                            <div class="main__form--container">
                                <textarea class="main__container--input" name="contentComment" id="contentComment" placeholder="{{ __('post.Whats happening?') }}" wire:model="contentComment"></textarea>
                                @if ($imageComment)
                                    <div class="main__container--image">
                                        <span class="main__icon material-symbols-rounded" wire:click="$set('imageComment', null)"> close </span>
                                        <img loading="lazy" class="main__image" src="{{ $imageComment->temporaryUrl() }}" alt="{{ __('image.Uploaded image') }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="main__buttons">
                            <div class="main__button--container">
                                <label for="uploadImageComment">
                                    <span class="main__button--icon material-symbols-rounded">image</span>
                                </label>
                                <input class="main__button--element main__button--image" id="uploadImageComment" type="file" wire:model="imageComment" />
                                @error($imageComment)
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="main__button--submit @if ((!$contentComment) AND (!$imageComment)) disabled @endif" type="submit" @if ((!$contentComment) AND (!$imageComment)) disabled @endif >{{ __('post.Post') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="post__modal--close" wire:click="$set('opened', false)"></div>
        </div>
    </div>
    @endif
</div>
