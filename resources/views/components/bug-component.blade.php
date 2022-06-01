<div>
    <button class="header__more--element header__more--bug" wire:click="openModalBug"><span class="header__element--icon material-symbols-rounded">bug_report</span> {{ __('bug.Report Bug') }}</button>

    @if ($interfaceBug)
    <div class="bug__modal--main">
            <div class="bug__modal--container">
                <div class="bug__container--header">
                    {{ __('bug.Report bug') }}
                </div>
                <form class="bug__container--form" wire:submit.prevent="store">
                    <div class="bug__form--body">
                        <div class="bug__body--image">
                            <img loading="lazy" class="bug--image" src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="{{ __('image.Profiles image') }}">
                        </div>
                        <div class="bug__body--main">
                            <textarea class="bug__main--text" type="text" placeholder="{{ __('bug.Write bug') }}" wire:model="textBug" wire:ignore></textarea>
                        </div>
                    </div>
                </form>
                <div class="bug__container--options">
                    <button class="bug__option--element bug__option--cancel" wire:click="$set('interfaceBug', false)">{{ __('bug.Back') }}</button>
                    <button class="bug__option--element bug__option--main @if (!$textBug) disabled @endif" @if (!$textBug) disabled @endif wire:click="store">{{ __('bug.Send') }}</button>
                </div>
            </div>
            <div class="bug__modal--close" wire:click="$set('interfaceBug', false)"></div>
        </div>
    @endif
</div>
