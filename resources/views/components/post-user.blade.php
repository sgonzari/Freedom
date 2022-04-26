<table>
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Content</th>
            <th>Creación</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->user->first()->username }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                @if ($post->user->first()->id_user == Auth::user()->id_user)
                <td><button wire:click="$emit()">Modificar</button></td>
                <td><button wire:click="$emit('delete', {{ $post->id_post }})">Eliminar</button></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>