@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Les meues comandes</h1>

        @if ($orders->isEmpty())
            <p>No tens cap comanda realitzada.</p>
        @else
            @foreach ($orders as $order)
                <div class="mb-4 border p-3">
                    <h2>Comanda #{{ $order->id }} - {{ $order->created_at->format('d/m/Y H:i') }}</h2>
                    <p><strong>Mètode de pagament:</strong> {{ $order->payment_method }}</p>
                    <p><strong>Adreça d'enviament:</strong> {{ $order->shipping_address }}</p>
                    <p><strong>Total:</strong> {{ number_format($order->total_price, 2) }} €</p>
                    <h3>Productes:</h3>
                    <ul>
                        @foreach ($order->items as $item)
                            <li>
                                {{ $item->product->name }} - {{ $item->quantity }} × {{ number_format($item->price, 2) }} €
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @endif
    </div>
@endsection
