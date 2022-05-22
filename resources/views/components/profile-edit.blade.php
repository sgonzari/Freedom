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
                            <input class="profile__input profile__input--name" value="{{ Auth::user()->name }}" id="name" name="name" />
                            <div>
                                <label class="profile__label--username" for="username">{{ __('@') }}</label>
                                <input class="profile__input profile__input--username" value="{{ Auth::user()->username }}" id="username" name="username" />
                            </div>
                        </div>
                    </div>
                    <div class="profile__body--element">
                        <label class="profile__body--label" for="description">Description:</label>
                        <input class="profile__body--input" type="text" value="{{ Auth::user()->description }}" id="description" name="description" />
                    </div>
                    <div class="profile__body--element">
                        <label class="profile__body--label" for="birthday">Birthday:</label>
                        <input class="profile__body--input" type="date" value="{{ Auth::user()->birthday }}" id="birthday" name="birthday" />
                    </div>
                </form>
                <div class="profile__container--footer">
                    <button class="profile__footer--element" wire:click="editProfile">Guardar</button>
                </div>
            </div>
            <div class="profile__modal--close" wire:click="$set('profileModal', false)"></div>
        </div>
    @endif
</div>
