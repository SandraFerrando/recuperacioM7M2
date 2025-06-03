<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Obtenim els productes del carret des de la base de dades
            $cartItems = Auth::user()->cartItems()->with('product')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->route('products.index')->with('error', 'El carret està buit.');
            }

            // Calcular el total
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // Crear la comanda
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $totalPrice,
                'payment_method' => $request->payment_method,
                'shipping_address' => $request->shipping_address,
            ]);

            // Crear els detalls de la comanda
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            // Buidar el carret
            Auth::user()->cartItems()->delete();

            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Comanda realitzada correctament.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al processar la comanda.');
        }
    }

    public function show(Order $order)
    {
        // Només permet accedir si és l'usuari propietari o un admin
        if (auth()->user()->role === 'client' && $order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
}
