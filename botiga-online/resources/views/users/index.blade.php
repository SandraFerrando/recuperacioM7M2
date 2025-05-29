@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestió d'usuaris</h1>

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}">✏️ Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
