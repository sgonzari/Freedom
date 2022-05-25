<div class="main__container--posts">
    @if (!empty($posts))
        @foreach ($posts as $post)
            @livewire('post-component', ['post' => $post], key($post->id_post))
        @endforeach
    @else
        <h1>{{ __('home.There isnt post') }}</h1>
    @endif
</div>