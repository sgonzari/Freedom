<div>
    @if (is_null($user))
        <h1>La cuenta no existe</h1>
    @else
        @livewire('profile-info', ['user' => $user, 'option' => $option], key($user->id_user))

        @if (!empty($posts))
            @foreach ($posts as $post)
                @livewire('post-component', ['post' => $post], key($post->id_post))
            @endforeach
        @else
            <h1>No tiene posts</h1>
        @endif
    @endif
</div>