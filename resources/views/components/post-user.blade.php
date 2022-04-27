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
                    <td><button wire:click="$emit('delete', {{ $post->id_post }})">Eliminar</button></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h1>No tiene posts</h1>
@endif