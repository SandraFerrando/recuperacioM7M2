<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Product $product, Request $request)
    {
        $cartItem = CartItem::firstOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $product->id],
            ['quantity' => 0]
        );

        $cartItem->quantity += $request->input('quantity', 1);
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Producte afegit al carret!');
    }

    public function update(cartItem $cartItem, Request $request)
    {
        if ($cartItem->user_id !== auth()->id()) {
            abort(403);
        }

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Quantitat actualitzada correctament.');
    }


    public function remove(CartItem $cartItem)
    {
        $this->authorize('delete', $cartItem); // opcional
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Producte eliminat!');
    }
}
