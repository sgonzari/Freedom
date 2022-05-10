<div class="main__container--posts">
    @if (!empty($posts))
        @foreach ($posts as $post)
            @livewire('post-component', ['post' => $post], key($post->id_post))
        @endforeach
    @else
        <h1>No hay publicaciones</h1>
    @endif
</div>