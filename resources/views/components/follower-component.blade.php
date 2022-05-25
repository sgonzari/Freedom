<div class="follower">
    <button class="profile__count--element" wire:click="$set('interfaceFollower', true)"><span class="profile__element--count">{{ $user->followers()->count() }}</span> follower</button>

    @if ($interfaceFollower)
    <div class="follower__modal">
        <div class="follower__modal--container">
            <div class="follower__container--header">
                <div class="follower__header--back" wire:click="$set('interfaceFollower', false)">
                    <svg class="follower__header--icon" viewBox="0 0 24 24" aria-hidden="true">
                        <g>
                            <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                            </path>
                        </g>
                    </svg>
                </div>
                <h2 class="follower__header--title">Followers</h2>
            </div>
            <div class="follower__container--body">
                @foreach ($user->followers()->get() as $follower) 
                    @livewire('follow-component', ['user' => $follower], key($follower->id_user))
                @endforeach
            </div>
        </div>
        <div class="follower__modal--close" wire:click="$set('interfaceFollower', false)"></div>
    </div>
    @endif
</div>
