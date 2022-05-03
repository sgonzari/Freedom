<div>
    @if (!empty($bookmarks))
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Content</th>
                    <th>Creación</th>
                    <th>Eliminar bookmark</th>
                    <th>Eliminar publicación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookmarks as $bookmark)
                    <tr>
                        <td>{{ $bookmark->user->first()->username }}</td>
                        <td>{{ $bookmark->content }}</td>
                        <td>{{ $bookmark->created_at->format('d/m/Y') }}</td>
                        <td><button wire:click="$emit('deleteBookmark', {{ $bookmark->id_post }})">Eliminar</td>
                        @if (($bookmark->user->first()->id_user == Auth::user()->id_user) OR (Auth::user()->rol->first()->id_rol > 1))
                        <td><button wire:click="$emit('deletePost', {{ $bookmark->id_post }})">Eliminar</button></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No hay ningun bookmark.</h1>
    @endif
</div>