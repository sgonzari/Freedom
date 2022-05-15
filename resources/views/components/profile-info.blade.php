<div class="profile">
    <div class="profile__header">
        <div class="profile__header--image">
            <img class="profile__image" src="http://localhost/freedom/public/storage/{{ $user->profile_image }}" />
        </div>
        <div class="profile__header--text">
            <div class="profile__text--name">
                <span>{{ $user->name }}</span>
            </div>
            <div class="profile__text--username">
                <span>{{ __('@') }}{{ $user->username }}</span>
            </div>
            <p class="profile__text--username"></p>
        </div>
        <div class="profile__header--buttons">
            <div class="profile__button">
                @if (Auth::user()->id_user === $user->id_user)
                    <button class="profile__button--element" wire:click="editProfile">{{ __('Edit Profile') }}</button>
                @else
                    @if (Auth::user()->followings()->find($user->id_user))
                        <button class="profile__button--element" wire:click="unfollowUser">Dejar de seguir</button>
                    @else
                        <button class="profile__button--element" wire:click="followUser">Seguir</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class="profile__main">
        <div class="profile__main--description">
            <p class="profile__description">{{ $user->description }}</p>
        </div>
        <div class="profile__main--info">
            <div class="profile__info--element">
                <span class="profile__element--icon material-symbols-rounded"> celebration </span>
                <p class="profile__element--text">{{ date('d-M-Y', strtotime($user->birthday)) }}</p>
            </div>
            <div class="profile__info--element">
                <span class="profile__element--icon material-symbols-rounded"> calendar_month </span>
                <p class="profile__element--text">{{ $user->created_at->format('d-m-Y') }}</p>
            </div>
        </div>
        <div class="profile__main--count">
            <p class="profile__count--element">
                <span class="profile__element--count">{{ $user->followings()->count() }}</span> following</p>
            <p class="profile__count--element">
                <span class="profile__element--count">{{ $user->followers()->count() }}</span> followers</p>
        </div>
    </div>
    <div class="profile__footer">
        <a class="profile__footer--element @if ($option == 'posts') active @endif" href="{{ route('profile', $user->username) }}">Posts</a>
        <a class="profile__footer--element @if ($option == 'reposts') active @endif" href="{{ route('profile-reposts', ['username' => $user->username]) }}">Reposts</a>
        <a class="profile__footer--element @if ($option == 'likes') active @endif" href="{{ route('profile-likes', ['username' => $user->username]) }}">Likes</a>
    </div>
</div>
