@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestió d'usuaris</h1>
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block mb-4">
            ➕ Nou usuari
        </a>

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

                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline" onsubmit="return confirm('Segur que vols eliminar aquest usuari?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
