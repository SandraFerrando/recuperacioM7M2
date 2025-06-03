@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalls de la comanda #{{ $order->id }}</h1>

    <p><strong>Data:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Estat:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Total:</strong> {{ number_format($order->total, 2) }} €</p>

    <h2 class="mt-4">Productes:</h2>
    <ul>
        @foreach ($order->items as $item)
            <li>
                {{ $item->product->name }} – {{ $item->quantity }} x {{ number_format($item->price, 2) }} €
            </li>
        @endforeach
    </ul>

    <a href="{{ route('orders.index') }}" class="inline-block mt-4 text-blue-600 underline">← Tornar a les comandes</a>
</div>
@endsection
