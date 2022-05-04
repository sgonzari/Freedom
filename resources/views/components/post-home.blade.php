<div>
    @if (!empty($posts))
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Content</th>
                    <th>Creación</th>
                    <th>Bookmark</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->user->first()->username }}</td>
                        <td><a href="/{{ $post->user->first()->username }}/post/{{ $post->id_post }}">{{ $post->content }}</a></td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        @if (is_null(Auth::user()->bookmarks()->find($post->id_post)))
                            <td><button wire:click="$emit('addBookmark', {{ $post->id_post }})">Agregar</button></td>
                        @else
                            <td><button wire:click="$emit('deleteBookmark', {{ $post->id_post }})">Eliminar</button></td>
                        @endif
                        @if (($post->user->first()->id_user == Auth::user()->id_user) OR (Auth::user()->rol->first()->id_rol > 1))
                            <td><button wire:click="$emit('deletePost', {{ $post->id_post }})">Eliminar</button></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No hay publicaciones</h1>
    @endif
</div>