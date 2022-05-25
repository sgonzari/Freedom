<div>
    @if (!$bookmarks)
        @foreach ($bookmarks as $bookmark)
            @livewire('post-component', ['post' => $bookmark], key($bookmark->id_post))
        @endforeach
    @else
        <h1>{{ __('bookmark.You havent bookmark') }}</h1>
    @endif
</div>