<div>
    <div>
        <h1>Grupos</h1>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if (Auth::user()->id_user != $user->id_user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>
                                @if ((Auth::user()->fk_rol > $user->fk_rol) AND ($user->fk_rol > 1))
                                    <button wire:click="$emit('downRank', {{ $user->id_user }})">-</button>
                                @endif
                                {{ $user->rol()->first()->name }}
                                @if ((Auth::user()->fk_rol > $user->fk_rol) AND ($user->fk_rol < 3))
                                    <button wire:click="$emit('upRank', {{ $user->id_user }})">+</button>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
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

    <div>
        <h1>Informes</h1>

    </div>
</div>
