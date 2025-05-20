@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>

        <p><strong>Descripció:</strong> {{ $product->description }}</p>
        <p><strong>Preu:</strong> {{ $product->price }} €</p>
        <p><strong>Estoc:</strong> {{ $product->stock }}</p>

        @if ($product->image)
            <div>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Imatge del producte" style="max-width: 300px;">
            </div>
        @endif

        <a href="{{ route('products.edit', $product) }}" class="text-blue-600 underline">
            ✏️ Editar producte
        </a>
        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Segur que vols eliminar aquest producte?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 underline">
                🗑️ Eliminar producte
            </button>
        </form>
        <a href="{{ route('products.index') }}">← Tornar al llistat</a>
    </div>
@endsection
