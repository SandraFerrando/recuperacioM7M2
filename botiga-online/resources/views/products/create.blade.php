@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Afegir nou producte</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nom:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Descripció:</label>
            <textarea name="description" required></textarea>
        </div>

        <div>
            <label>Preu:</label>
            <input type="number" name="price" step="0.01" required>
        </div>

        <div>
            <label>Estoc:</label>
            <input type="number" name="stock" required>
        </div>

        <div>
            <label>Imatge:</label>
            <input type="file" name="image">
        </div>

        <button type="submit">Desar producte</button>
    </form>
</div>
@endsection
