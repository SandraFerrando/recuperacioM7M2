@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nou usuari</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div>
                <label>Nom:</label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label>Correu electrònic:</label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label>Contrasenya:</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <label>Confirmar contrasenya:</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <div>
                <label>Rol:</label>
                <select name="role" required>
                    <option value="client">Client</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <button type="submit">Crear usuari</button>
        </form>
    </div>
@endsection
