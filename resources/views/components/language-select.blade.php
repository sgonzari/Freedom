<div>
    <button class="header__more--element header__more--language" wire:click="$set('interfaceLanguage', true)"><span class="header__element--icon material-symbols-rounded">translate</span> {{ __('language.Language') }}</button>

    @if ($interfaceLanguage)
    <div class="language__modal--main">
            <div class="language__modal--container">
                <div class="language__container--header">
                    {{ __('language.Select preferred language') }}
                </div>
                <form class="language__container--form" wire:submit.prevent="changeLanguage">
                    <div class="language__form--body">
                        <select class="language__body--options" name="selectedLanguage" id="selectedLanguage" wire:model="selectedLanguage">
                            <option value="" hidden>---- {{ __('language.Language') }} ----</option>
                            @foreach (Config::get('languages') as $lang => $language)
                                <option class="language__options--element" value="{{ $lang }}">{{ $language }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="language__container--options">
                    <button class="language__option--element language__option--cancel" wire:click="$set('interfaceLanguage', false)">{{ __('language.Back') }}</button>
                    <button class="language__option--element language__option--main @if (!$selectedLanguage) disabled @endif" @if (!$selectedLanguage) disabled @endif wire:click="changeLanguage">{{ __('language.Save') }}</button>
                </div>
            </div>
            <div class="language__modal--close" wire:click="$set('interfaceLanguage', false)"></div>
        </div>
    @endif
</div>
