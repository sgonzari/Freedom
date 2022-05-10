<div class="search">
    <div class="search__main relative">
        <form class="search__main--form" wire:submit.prevent="search">
            <span class="search__form--icon material-icons"> search </span>
            <input class="search__form--input" type="text" placeholder="search Freedom" wire:model="query">
        </form>

        @if (!empty($query))
            <div class="search__main--results absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                @foreach ($results as $result) 
                    <div class="search__result">
                        <a href="{{ route('profile', $result->username) }}">
                            <span>{{ $result->username }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>