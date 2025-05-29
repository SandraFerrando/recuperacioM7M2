@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @auth
        @if(auth()->user()->role === 'admin')
            <div class="mb-4">
                <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Afegir producte
                </a>
            </div>
        @endif
    @endauth

    <h1 class="text-xl font-bold mb-4">Llista de productes</h1>

    @if ($products->isEmpty())
        <p>No hi ha productes disponibles.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 justify-center">
            @foreach ($products as $product)
                <div class="border p-3 rounded shadow text-center text-sm flex flex-col items-center space-y-2 max-w-xs mx-auto">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-24 h-24 object-cover rounded">
                    @endif

                    <h2 class="font-semibold">
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->name }}
                        </a>
                    </h2>
                    <p class="text-gray-700">{{ number_format($product->price, 2) }} €</p>

                    @auth
                        @if(auth()->user()->role === 'client')
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded w-full">
                                    Afegir al carret
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    @endif
@endsection
