<table>
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Content</th>
            <th>Creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->user->first()->username }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->created_at->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>