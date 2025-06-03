@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Finalitzar compra</h1>

    @if ($cart->isEmpty())
        <p>El carret està buit.</p>
    @else
        <h3>Resum del carret:</h3>
        <ul>
            @foreach ($cart as $item)
                <li>
                    {{ $item['name'] }} - Quantitat: {{ $item['quantity'] }} - Preu unitari: {{ number_format($item['price'], 2) }} €
                </li>
            @endforeach
        </ul>

        <p><strong>Total: {{ number_format($total, 2) }} €</strong></p>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mt-4">
                <label for="payment_method">Forma de pagament:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="">-- Selecciona una opció --</option>
                    <option value="targeta">Targeta de crèdit</option>
                    <option value="paypal">PayPal</option>
                    <option value="transferencia">Transferència bancària</option>
                    <option value="reembossament">Contra-reembossament</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="shipping_address">Adreça d'enviament:</label>
                <input type="text" name="shipping_address" id="shipping_address" required>
            </div>

            <div class="mt-4">
                <button type="submit">Confirmar comanda</button>
            </div>
        </form>
    @endif
</div>
@endsection
