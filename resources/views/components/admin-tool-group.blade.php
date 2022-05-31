<div class="admin__tool--element">
    <div class="admin__element--header">
        <span class="admin__header--icon material-symbols-rounded"> search </span>
        <input class="admin__header--input" type="text" wire:model="query" placeholder="{{ __('admin.search User') }}" />
        @if ($query)
            <span class="admin__header--icon admin__header--close material-symbols-rounded" wire:click="$set('query', '')"> close </span>
        @endif
    </div>
    <div class="admin__element--main">
        @foreach ($users as $user)
            <div class="admin__group--main">
                <div class="admin__main--profile">
                    <a class="admin__profile--image" href="{{ route('profile', $user->username) }}" target="_blank">
                        <img loading="lazy" class="admin__image" src="{{ asset('storage/'. $user->profile_image) }}" alt="{{ __('image.Profiles image') }}" />
                    </a>
                    <div class="admin__profile--text">
                        <a class="admin__text--name" href="{{ route('profile', $user->username) }}" target="_blank">{{ $user->name }}</a>
                        <span class="admin__text--username">{{ __('@') }}{{ $user->username }}</span>
                    </div>
                </div>
                <div class="admin__main--rol">
                    <p class="admin__rol--text">
                        @if ($user->fk_rol === 1)
                            {{ __('admin.User') }}
                        @elseif ($user->fk_rol === 2)
                            {{ __('admin.Admin') }}
                        @else
                            {{ __('admin.God') }}
                        @endif
                    </p>
                </div>
                <div class="admin__main--options">
                        <button class="admin__option--element" wire:click="upRank({{ $user->id_user }})"><span class="admin__element--icon @if (($user->fk_rol > 2) OR ($user->fk_rol >= Auth::user()->fk_rol)) disable @endif material-symbols-rounded">expand_less</span></button>
                        <button class="admin__option--element" wire:click="downRank({{ $user->id_user }})"><span class="admin__element--icon @if (($user->fk_rol < 2) OR ($user->fk_rol >= Auth::user()->fk_rol)) disable @endif material-symbols-rounded">expand_more</span></button>
                </div>
            </div>
        @endforeach
    </div>
</div>
