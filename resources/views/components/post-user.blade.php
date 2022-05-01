<div>
    @if (!empty($posts))
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Content</th>
                    <th>Creación</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->user->first()->username }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        @if (($post->user->first()->id_user == Auth::user()->id_user) OR (Auth::user()->rol->first()->id_rol > 1))
                        <td><button wire:click="$emit('deletePost', {{ $post->id_post }})">Eliminar</button></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No tiene posts</h1>
    @endif

    @if ($user->id_user != Auth::user()->id_user) 
        <h1>Buttons</h1>
        <h2>{{ $user->username }} : {{ $user->id_user }}</h2>
        @if (Auth::user()->followings()->find($user->id_user))
            <button wire:click="$emit('unfollowUser')">Dejar de seguir</button>
        @else
            <button wire:click="$emit('followUser')">Seguir</button>
        @endif
    @endif
</div>