@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar usuari</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Nom:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label>Correu electrònic:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div>
                <label>Rol:</label>
                <select name="role" required>
                    <option value="client" {{ old('role', $user->role) === 'client' ? 'selected' : '' }}>Client</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <button type="submit">Actualitzar usuari</button>
        </form>
    </div>
@endsection
