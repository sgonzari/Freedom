<div>
    <button class="warning__delete--button" wire:click="$set('modal', true)"><span class="warning__delete--icon material-symbols-rounded">delete</span></button>

    @if ($modal)
        <div class="warning__delete--modal">
            <div class="warning__modal--container">
                <div class="warning__modal--header">
                    {{ __('admin.Confirmation') }}
                </div>
                <div class="warning__modal--body">
                    <a class="warning__container--profile" href="{{ route('profile', $warning->reportedBy()->first()->username) }}" target="_blank">
                        <img class="warning__image" src="http://localhost/freedom/public/storage/{{ $warning->reportedBy()->first()->profile_image }}" alt="{{ __('image.Profiles image') }}" />
                    </a>
                    <div class="warning__container--main">
                        <div class="warning__container--header">
                            <div class="warning__header">
                                <a class="warning__header--name" href="{{ route('profile', $warning->reportedBy()->first()->username) }}" target="_blank">{{ $warning->reportedBy()->first()->name }} </a>
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
                <div class="warning__modal--footer">
                    <button class="warning__footer--element warning__footer--cancel" wire:click="$set('modal', false)">{{ __('admin.Close') }}</button>
                    <button class="warning__footer--element warning__footer--delete" wire:click="deleteWarning">{{ __('admin.Delete') }}</button>
                </div>
            </div>
            <div class="warning__modal--close" wire:click="$set('modal', false)">

            </div>
        </div>
    @endif
</div>
