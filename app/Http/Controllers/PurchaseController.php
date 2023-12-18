<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        $cart = $user->cart;

        if ($cart->isEmpty()) {
            return redirect('/cart')->with('message', 'Your cart is empty. Add products before checking out!');
        }

        if (!$user->addresses->first()) {
            return back()->with('message', 'You need to add an address to checkout!');
        }

        $cart = $user->cart;

        $total = 0;

        foreach ($cart as $product) {
            $total += $product->pivot->quantity * $product->price;
        }

        $addressId = $request->input('addressId');
        if (!$user->addresses->contains($addressId)) {
            return back()->with('message', 'Invalid address selected.');
        }

        $fields = [
            'user_id' => $user->id,
            'total' => $total,
            'address_id' => $addressId,
        ];

        $purchase = Purchase::create($fields);

        foreach ($cart as $product) {
            $purchase->products()->attach($product->id, ['quantity' => $product->pivot->quantity]);
        }

        $user->cart()->detach();

        return redirect('/')->with('message', 'Purchase has been completed!');
    }
}
