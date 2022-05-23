<div>
    @if (is_null($user))
        <h1>La cuenta no existe</h1>
    @else
        @livewire('profile-info', ['user' => $user, 'option' => $option])

        @if (Auth::user()->posts()->where('pinged', 1)->first())
            @livewire('profile-pin', ['user' => $user])
        @endif

        @if (!empty($posts))
            @foreach ($posts as $post)
                @livewire('post-component', ['post' => $post], key($post->id_post))
            @endforeach
        @else
            <h1>No tiene posts</h1>
        @endif
    @endif
</div>