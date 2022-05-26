<div class="following">
    <button class="profile__count--element" wire:click="$set('interfaceFollowing', true)"><span class="profile__element--count">{{ $user->followings()->count() }}</span> {{ __('profile.Followings') }}</button>

    @if ($interfaceFollowing)
    <div class="following__modal">
        <div class="following__modal--container">
            <div class="following__container--header">
                <div class="following__header--back" wire:click="closeFollowingModal">
                    <svg class="following__header--icon" viewBox="0 0 24 24" aria-hidden="true">
                        <g>
                            <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                            </path>
                        </g>
                    </svg>
                </div>
                <h2 class="following__header--title">{{ __('profile.Followings') }}</h2>
            </div>
            <div class="following__container--body">
                @foreach ($user->followings()->get() as $following) 
                    @livewire('follow-component', ['user' => $following], key($following->id_user))
                @endforeach
            </div>
        </div>
        <div class="following__modal--close" wire:click="closeFollowingModal"></div>
    </div>
    @endif
</div>
