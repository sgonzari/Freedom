<div class="profile__modal">
    <button class="profile__button--element" wire:click="$set('profileModal', true)">{{ __('Edit Profile') }}</button>

    @if ($profileModal)
        <div class="profile__modal--main">
            <div class="profile__modal--container">
                <div class="profile__container--header">
                    <div class="profile__header--back" wire:click="$set('profileModal', false)">
                        <svg class="profile__header--icon" viewBox="0 0 24 24" aria-hidden="true">
                            <g>
                                <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div class="profile__header--info">
                        <h2 class="profile__header--title">
                            Edit Profile
                        </h2>
                    </div>
                </div>
                <form class="profile__container--body">
                    <div class="profile__body--info">
                        <div class="profile__info--image">
                            <img class="profile__image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}" alt="Imagen de perfil">
                        </div>
                        <div class="profile__info--text">
                            <h2 class="profile__text--name">{{ Auth::user()->name }}</h2>
                            <p class="profile__text--username">{{ __('@') }}{{ Auth::user()->username }}</p>
                        </div>
                    </div>
                    <div class="profile__body--description">
                        <div class="profile__description--text">{{ Auth::user()->description }}</div>
                    </div>
                    <div class="profile__body--birthday">
                        <div class="profile__birthday--text">{{ Auth::user()->birthday }}</div>
                    </div>
                </form>
                <div class="profile__container--footer">
                    <button>Guardar</button>
                </div>
            </div>
            <div class="profile__modal--close" wire:click="$set('profileModal', false)"></div>
        </div>
    @endif
</div>
