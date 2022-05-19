<div class="admin__tool--element">
    <div class="admin__element--header">
        <h1>Grupos</h1>
    </div>
    <div class="admin__element--main">
        @foreach ($users as $user)
            <div class="admin__group--main">
                <div class="admin__main--profile">
                    <div class="admin__profile--image">
                        <img class="admin__image" src="http://localhost/freedom/public/storage/{{ $user->profile_image }}" alt="Profile Image" />
                    </div>
                    <div class="admin__profile--text">
                        <h2 class="admin__text--name">{{ $user->name }}</h2>
                        <span class="admin__text--username">{{ __('@') }}{{ $user->username }}</span>
                    </div>
                </div>
                <div class="admin__main--rol">
                    <p class="admin__rol--text">{{ $user->rol()->first()->name }}</p>
                </div>
                <div class="admin__main--options">
                        <button class="admin__option--element" wire:click="upRank({{ $user->id_user }})"><span class="admin__element--icon @if (($user->fk_rol > 2) OR ($user->fk_rol >= Auth::user()->fk_rol)) disable @endif material-symbols-rounded">expand_less</span></button>
                        <button class="admin__option--element" wire:click="downRank({{ $user->id_user }})"><span class="admin__element--icon @if (($user->fk_rol < 2) OR ($user->fk_rol >= Auth::user()->fk_rol)) disable @endif material-symbols-rounded">expand_more</span></button>
                </div>
            </div>
        @endforeach
    </div>
</div>