<div class="admin__tool--element">
    <div class="admin__element--header">
        <h1>{{ __('admin.Warnings') }}</h1>
    </div>
    <div class="admin__element--main">
        @foreach ($users as $user)
            <div class="admin__warning--main">
                <div class="admin__main--profile">
                    <a class="admin__profile--image" href="{{ route('profile', $user->username) }}" target="_blank">
                        <img class="admin__image" src="http://localhost/freedom/public/storage/{{ $user->profile_image }}" alt="Profile Image" />
                    </a>
                    <div class="admin__profile--text">
                        <a class="admin__text--name" href="{{ route('profile', $user->username) }}" target="_blank">{{ $user->name }}</a>
                        <span class="admin__text--username">{{ __('@') }}{{ $user->username }}</span>
                    </div>
                </div>
                <div class="admin__main--count">
                    <p class="admin__count--text admin__count--{{ $user->warnings()->count() }}">{{ $user->warnings()->count() }}/3 
                        @if ($user->warnings()->count() > 1)
                            {{ __('admin.warnings') }}
                        @else
                            {{ __('admin.warning') }}
                        @endif
                    </p>
                </div>
                <div class="admin__main--options">
                    @livewire('warning-create', ['user' => $user], key($user->id_user))
                </div>
            </div>
        @endforeach
    </div>
</div>
