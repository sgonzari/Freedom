<div class="admin__tool--element">
    <h1>Warnings</h1>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Avisar</th>
                <th>Avisos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if (Auth::user()->id_user != $user->id_user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if ($user->warnings()->count() < 3)
                                @livewire('warning-create', ['user' => $user], key($user->id_user))
                            @endif
                        </td>
                        <td>{{ $user->warnings()->count() }} / 3</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
