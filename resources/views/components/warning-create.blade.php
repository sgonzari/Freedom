<div>
    <button class="admin__option--element" wire:click="$set('interfaceWarning', true)"><span class="admin__element--icon material-symbols-rounded">warning</span></button>

    @if ($interfaceWarning)
    <div class="warning__modal--main">
        <div class="warning__modal--container">
            <div class="warning__main--header">
                <h1>Warning | {{ $user->username }}</h1>
            </div>
            <div class="warning__main--body">
                <div class="warning__list">
                    @foreach ($user->warnings()->get() as $warning)
                        <div class="warning__list--element">
                            <div class="warning__element--container">
                                <div class="warning__container--profile">
                                    <img class="warning__image" src="http://localhost/freedom/public/storage/{{ $user->profile_image }}" alt="Profile Image" />
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
                            <div class="warning__element--delete">
                                <span class="warning__delete--icon material-symbols-rounded">delete</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($user->warnings()->count() < 3)
                    <form class="warning__form" wire:submit.prevent="storeWarning">
                        <div class="warning__form--image">
                            <img class="warning__image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}" alt="Profile Image"/>
                        </div>
                        <input class="warning__form--input" placeholder="Write your warning" name="message" wire:model="message" type="text" autofocus/>
                    </form>
                @endif
            </div>
            <div class="warning__main--footer">
                <button class="warning__footer--element warning__footer--cancel" wire:click="$set('interfaceWarning', false)">Cerrar</button>
                @if ($user->warnings()->count() < 3)
                    <button class="warning__footer--element @if (!$message) disabled @endif" wire:click="storeWarning">Enviar</button>
                @endif
            </div>
        </div>
        <div class="warning__modal--close" wire:click="$set('interfaceWarning', false)"></div>
    </div>
    @endif
</div>
