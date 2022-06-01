<div class="post__modal--report">
    <button class="post__modal--element post__modal--delete" wire:click="openModalReport">
        <span class=" post__modal--icon material-symbols-rounded"> report </span> {{ __('post.Report post') }}
    </button>

    @if ($interfaceReport)
        <div class="post__modal--main">
            <div class="post__modal--container">
                <div class="post__container--header">
                    {{ __('post.Report post from') }} {{ $post->user()->first()->name }}
                </div>
                <form class="post__container--form" wire:submit.prevent="reportPost">
                    <div class="post__form--body">
                        <div class="post__body--image">
                            <img loading="lazy" class="post__image" src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="{{ __('image.Profiles image') }}" />
                        </div>
                        <textarea class="post__body--input" placeholder="{{ __('post.Write your report') }}" name="message" maxlength="255" wire:model="reason" wire:ignore></textarea>
                    </div>
                </form>
                @if($errors->any())
                    <div class="error">
                        {!! implode('', $errors->all('<p class="error__text">:message</p>')) !!}
                    </div>
                @endif
                <div class="post__container--options">
                    <button class="post__option--element post__option--cancel" wire:click="$set('interfaceReport', false)">{{ __('post.Cancel') }}</button>
                    <button class="post__option--element post__option--report @if (!$reason) disabled @endif" wire:click="reportPost" @if (!$reason) disabled @endif>{{ __('post.Report') }}</button>
                </div>
            </div>
            <div class="post__modal--close" wire:click="$set('interfaceReport', false)"></div>
        </div>
    @endif
</div>
