<div class="admin__tool--element">
    <div class="admin__element--header">
        <span class="admin__header--icon material-symbols-rounded"> search </span>
        <input class="admin__header--input" type="text" wire:model="query" placeholder="{{ __('admin.search bugs') }}" />
        @if ($query)
            <span class="admin__header--icon admin__header--close material-symbols-rounded" wire:click="$set('query', '')"> close </span>
        @endif
    </div>
    <div class="admin__element--main">
        @if ($bugs->where('completed', false)->count() > 0)
            @foreach ($bugs->where('completed', false) as $bug)
                <div class="admin__report--main">
                    <div class="admin__main--profile">
                        <a class="admin__profile--image" href="{{ route('profile', $bug->user()->first()->username) }}" target="_blank">
                            <img loading="lazy" class="admin__image" src="{{ asset('storage/'.$bug->user()->first()->profile_image) }}" alt="{{ __('image.Profiles image') }}" />
                        </a>
                        <div class="admin__profile--text">
                            <a class="admin__text--name" href="{{ route('profile', $bug->user()->first()->username) }}" target="_blank">{{ $bug->user()->first()->name }}</a>
                            <span class="admin__text--username">{{ __('@') }}{{ $bug->user()->first()->username }}</span>
                        </div>
                    </div>
                    <div class="admin__main--reason">
                        <p class="admin__reason--text">{{ $bug->text }}</p>
                    </div>
                    <div class="admin__main--options">
                        @livewire('bug-complete', ['bug' => $bug], key($bug->id_bug))
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty">
                <h1 class="empty__text">{{ __('admin.There isnt bug') }}</h1>
            </div>
            @endif
    </div>
</div>
