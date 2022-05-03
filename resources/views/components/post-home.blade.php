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
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        <td><button wire:click="$emit('addBookmark', {{ $post->id_post }})">Agregar</button></td>
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