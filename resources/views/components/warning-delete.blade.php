<div>
    <button class="warning__delete--button" wire:click="$set('modal', true)"><span class="warning__delete--icon material-symbols-rounded">delete</span></button>

    @if ($modal)
        <div class="warning__delete--modal">
            <div class="warning__modal--container">
                <div class="warning__modal--header">
                    Confirmación
                </div>
                <div class="warning__modal--body">
                    <div class="warning__container--profile">
                        <img class="warning__image" src="http://localhost/freedom/public/storage/{{ $warning->reportedBy()->first()->profile_image }}" alt="Profile Image" />
                    </div>
                    <div class="warning__container--main">
                        <div class="warning__container--header">
                            <div class="warning__header">
                                <div class="warning__header--name">{{ $warning->reportedBy()->first()->name }} <span class="warning__header--username">{{ __('@') }}{{ $warning->reportedBy()->first()->username }}</span></div>
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
                    <button class="warning__footer--element warning__footer--cancel" wire:click="$set('modal', false)">Cerrar</button>
                    <button class="warning__footer--element warning__footer--delete" wire:click="deleteWarning">Eliminar</button>
                </div>
            </div>
            <div class="warning__modal--close" wire:click="$set('modal', false)">

            </div>
        </div>
    @endif
</div>
