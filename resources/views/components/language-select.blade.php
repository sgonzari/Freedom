<div>
    <button class="header__more--element header__more--language" wire:click="$set('interfaceLanguage', true)"><span class="header__element--icon material-symbols-rounded">translate</span> {{ __('language.Change language') }}</button>

    @if ($interfaceLanguage)
    <div class="language__modal--main">
            <div class="language__modal--container">
                <div class="language__container--header">
                    {{ __('language.Select preferred language') }}
                </div>
                <form class="language__container--form" wire:submit.prevent="changeLanguage">
                    <div class="language__form--body">
                        <select name="lang" id="lang" wire:model="lang">
                            <option value="en" @if (Lang::locale() === 'en') selected @endif>{{ __('language.English') }}</option>
                            <option value="es" @if (Lang::locale() === 'es') selected @endif>{{ __('language.Spanish') }}</option>
                        </select>
                    </div>
                </form>
                <div class="language__container--options">
                    <button class="language__option--element language__option--cancel" wire:click="$set('interfaceLanguage', false)">{{ __('language.Back') }}</button>
                    <button class="language__option--element language__option--report" wire:click="changeLanguage">{{ __('language.Save') }}</button>
                </div>
            </div>
            <div class="language__modal--close" wire:click="$set('interfaceLanguage', false)"></div>
        </div>
    @endif
</div>
