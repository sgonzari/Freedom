<div>
    @if ($bookmarks->count() > 0)
        @foreach ($bookmarks as $bookmark)
            @livewire('post-component', ['post' => $bookmark], key($bookmark->id_post))
        @endforeach
    @else
        <div class="empty">
            <h1 class="empty__text">{{ __('bookmark.You havent bookmark') }}</h1>
        </div>
    @endif
</div>