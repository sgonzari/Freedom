<div>
    <div>
        <h1>Usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Opción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if (Auth::user()->id_user != $user->id_user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->rol()->first()->name }}</td>
                            <td>
                                @if ((Auth::user()->fk_rol > $user->fk_rol) AND ($user->fk_rol < 3))
                                    <button wire:click="$emit('upRank', {{ $user->id_user }})">+</button>
                                @endif
                                @if ((Auth::user()->fk_rol > $user->fk_rol) AND ($user->fk_rol > 1))
                                    <button wire:click="$emit('downRank', {{ $user->id_user }})">-</button>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div></div>
</div>
