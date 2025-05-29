@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">El teu carret de compra</h1>

    @if($cartItems->isEmpty())
        <p>No tens cap producte al carret.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producte</th>
                    <th>Preu</th>
                    <th>Quantitat</th>
                    <th>Total</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $item)
                    @php $subtotal = $item->product->price * $item->quantity; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->product->price, 2) }} €</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control w-50">
                                <button type="submit" class="btn btn-sm btn-primary ms-2">Actualitza</button>
                            </form>
                        </td>
                        <td>{{ number_format($subtotal, 2) }} €</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <h4>Total: {{ number_format($total, 2) }} €</h4>
            <a href="#" class="btn btn-success mt-2">Finalitzar la compra</a> {{-- Aquesta acció es pot implementar després --}}
        </div>
    @endif
</div>
@endsection
