<div>
    @if (!empty($notifications))
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Post</th>
                    <th>Content Post</th>
                    <th>Tipo de post</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->user()->get()->first()->username }}</td>
                        <td>{{ $notification->fk_post }}</td>
                        <td>{{ $notification->post()->get()->first()->content }}</td>
                        <td>{{ $notification->typeOf()->get()->first()->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No hay notificaciones</h1>
    @endif
</div>