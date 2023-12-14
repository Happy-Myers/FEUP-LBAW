<?php

namespace App\Http\Controllers;

use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function store(){
        $user = auth()->user();

        if(!$user->addresses->first()){
            return back()->with('message', 'You need to register an address to be able to checkout');
        }

        $cart = $user->cart;

        foreach($cart as $product){
            $total = $product->pivot->quantity * $product->price;
            $fields = [
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $product->pivot->quantity,
                'total' => $total,
                'address_id' => $user->addresses->first()->id,
            ];

            Purchase::create($fields);
        }
        
        $user->cart()->detach();

        return redirect('/');
    }
}
