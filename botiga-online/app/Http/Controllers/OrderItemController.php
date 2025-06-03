<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    // Llistat de línies de comanda (opcional)
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('order_items.index', compact('orderItems'));
    }

    // Mostrar una línia de comanda específica (opcional)
    public function show(OrderItem $orderItem)
    {
        return view('order_items.show', compact('orderItem'));
    }

    // Crear línia de comanda (si no es fa dins OrderController)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        OrderItem::create($validated);

        return redirect()->back()->with('success', 'Línia de comanda creada correctament.');
    }

    // Editar una línia de comanda (opcional)
    public function edit(OrderItem $orderItem)
    {
        return view('order_items.edit', compact('orderItem'));
    }

    // Actualitzar línia de comanda
    public function update(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        $orderItem->update($validated);

        return redirect()->route('order_items.index')->with('success', 'Línia de comanda actualitzada.');
    }

    // Eliminar una línia de comanda
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->back()->with('success', 'Línia de comanda eliminada correctament.');
    }
}
