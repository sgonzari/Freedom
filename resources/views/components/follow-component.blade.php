<div class="follow">
    <a class="follow__image" href="{{ route('profile', ['username' => $user->username]) }}">
        <img class="follow__image--image" src="http://localhost/freedom/public/storage/{{ $user->profile_image }}" alt="Imagen de perfil">
    </a>
    <a class="follow__info" href="{{ route('profile', ['username' => $user->username]) }}">
        <h2 class="follow__info--name">{{ $user->name }}</h2>
        <span class="follow__info--username">{{ __('@') }}{{ $user->username }}</span>
    </a>
    <div class="follow__option">
        @livewire('follow-button-component', ['user' => $user])
    </div>

</div>
