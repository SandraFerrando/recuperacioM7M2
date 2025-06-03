@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Les meves comandes</h1>

    @if ($orders->isEmpty())
        <p>No tens cap comanda registrada.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Data</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Estat</th>
                    <th class="px-4 py-2">Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->created_at->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ number_format($order->total, 2) }} €</td>
                        <td class="border px-4 py-2">{{ ucfirst($order->status) }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('orders.show', $order) }}" class="text-blue-600 underline">Veure</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
