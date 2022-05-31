<div class="profile">
    <div class="profile__header">
        <div class="profile__header--image">
            <img loading="lazy" class="profile__image" src="{{ asset('storage/'.$user->profile_image) }}" alt="{{ __('image.Profiles image') }}" />
        </div>
        <div class="profile__header--text">
            <div class="profile__text--name">
                <span>{{ $user->name }}</span>
            </div>
            <div class="profile__text--username">
                <span>{{ __('@') }}{{ $user->username }}</span>
            </div>
        </div>
        <div class="profile__header--buttons">
            <div class="profile__button">
                @if (Auth::user()->id_user === $user->id_user)
                    @livewire('profile-edit')
                @else
                    @livewire('follow-button-component', ['user' => $user])
                @endif
            </div>
        </div>
    </div>
    <div class="profile__main">
        <div class="profile__main--description">
            <p class="profile__description">{!!  nl2br(e($user->description)) !!}</p>
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
            @livewire('following-component', ['user' => $user])
            @livewire('follower-component', ['user' => $user])
        </div>
    </div>
    <div class="profile__footer">
        <a class="profile__footer--element @if ($option == 'posts') active @endif" href="{{ route('profile', $user->username) }}">{{ __('profile.Posts') }}</a>
        <a class="profile__footer--element @if ($option == 'reposts') active @endif" href="{{ route('profile-reposts', ['username' => $user->username]) }}">{{ __('profile.Reposts') }}</a>
        <a class="profile__footer--element @if ($option == 'likes') active @endif" href="{{ route('profile-likes', ['username' => $user->username]) }}">{{ __('profile.Likes') }}</a>
    </div>
</div>
