<div class="search">
    <div class="search__main">
        <form class="search__main--form" wire:submit.prevent="search">
            <span class="search__form--icon material-symbols-rounded"> search </span>
            <input class="search__form--input" type="text" placeholder="search Freedom" wire:model="query">
        </form>
    </div>
    
    @if (!empty($query))
        <div class="search__main--results">
            <div class="search__results">
                @foreach ($results as $result) 
                    <a class="search__result" href="{{ route('profile', $result->username) }}">
                        <img class="search__result--image" src="http://localhost/freedom/public/storage/{{ $result->profile_image }}"/>
                        <div class="search__result--info">
                            <h3 class="search__info--name">{{ $result->name }}</h3>
                            <span class="search__info--username">{{ __('@') }}{{ $result->username }}</span>
                            <p class="search__info--description">{{ $result->description }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>