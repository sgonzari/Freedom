<div>
    <h1>{{ $user->username }}</h1>
    <p>{{ $user->description }}</p>
        @if (Auth::user()->followings()->find($user->id_user))
            <button wire:click="unfollowUser">Dejar de seguir</button>
        @else
            <button wire:click="followUser">Seguir</button>
        @endif
</div>
