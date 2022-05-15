<div>
    @if (!empty($bookmarks))
        @foreach ($bookmarks as $bookmark)
            @livewire('post-component', ['post' => $bookmark], key($bookmark->id_post))
        @endforeach
    @else
        <h1>No hay ningun bookmark.</h1>
    @endif
</div>