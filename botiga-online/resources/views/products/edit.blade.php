@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar producte</h1>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label>Nom:</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
            </div>

            <div>
                <label>Descripció:</label>
                <textarea name="description" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label>Preu:</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>
            </div>

            <div>
                <label>Estoc:</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required>
            </div>

            <div>
                <label>Imatge (opcional):</label>
                <input type="file" name="image">
                @if ($product->image)
                    <p>Imatge actual:</p>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Imatge" style="max-width: 150px;">
                @endif
            </div>

            <button type="submit">Actualitzar producte</button>
        </form>
    </div>
@endsection
