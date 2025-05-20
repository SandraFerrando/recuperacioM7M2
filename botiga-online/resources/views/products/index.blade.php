@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
            <div class="mb-4">
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
            + Afegir producte
        </a>
    </div>

        <h1>Llista de productes</h1>

        @if ($products->isEmpty())
            <p>No hi ha productes disponibles.</p>
        @else
            <ul>
                @foreach ($products as $product)
                    <li>
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->name }} - {{ $product->price }} €
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
