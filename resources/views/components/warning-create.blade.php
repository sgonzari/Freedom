<div>
    <button class="admin__option--element" wire:click="$set('interfaceWarning', true)"><span class="admin__element--icon material-symbols-rounded">warning</span></button>

    @if ($interfaceWarning)
    <div class="warning__modal--main">
        <div class="warning__modal--container">
            <div class="warning__main--header">
                <h1>{{ __('admin.Warning') }} | <a class="warning__header--username" href="{{ route('profile', $user->username) }}" target="_blank">{{ __('@') }}{{ $user->username }}</a></h1>
            </div>
            <div class="warning__main--body">
                <div class="warning__list">
                    @foreach ($user->warnings()->get() as $warning)
                        <div class="warning__list--element">
                            <div class="warning__element--container">
                                <a class="warning__container--profile" href="{{ route('profile', $warning->reportedBy()->first()->username) }}" target="_blank">
                                    <img loading="lazy" class="warning__image" src="{{ asset('storage/'.$warning->reportedBy()->first()->profile_image) }}" alt="{{ __('image.Profiles image') }}" />
                                </a>
                                <div class="warning__container--main">
                                    <div class="warning__container--header">
                                        <div class="warning__header">
                                            <a class="warning__header--name" href="{{ route('profile', $warning->reportedBy()->first()->username) }}" target="_blank">{{ $warning->reportedBy()->first()->name }}</a>
                                            <span class="warning__header--username">{{ __('@') }}{{ $warning->reportedBy()->first()->username }}</span>
                                        </div>
                                    </div>
                                    <div class="warning__container--body">
                                        <div class="warning__body--content">
                                            <p class="warning__content--text">{{ $warning->reason }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="warning__element--delete">
                                @livewire('warning-delete', ['warning' => $warning], key($warning->id_warning))
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($user->warnings()->count() < 3)
                    <form class="warning__form" wire:submit.prevent="storeWarning">
                        <div class="warning__form--image">
                            <img loading="lazy" class="warning__image" src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="{{ __('image.Profiles image') }}"/>
                        </div>
                        <input class="warning__form--input" placeholder="{{ __('admin.Write your warning') }}" name="message" wire:model="message" type="text" autofocus/>
                    </form>
                @endif
            </div>
            <div class="warning__main--footer">
                <button class="warning__footer--element warning__footer--cancel" wire:click="$set('interfaceWarning', false)">{{ __('admin.Close') }}</button>
                @if ($user->warnings()->count() < 3)
                    <button class="warning__footer--element @if (!$message) disabled @endif" wire:click="storeWarning">{{ __('admin.Send') }}</button>
                @endif
            </div>
        </div>
        <div class="warning__modal--close" wire:click="$set('interfaceWarning', false)"></div>
    </div>
    @endif
</div>
