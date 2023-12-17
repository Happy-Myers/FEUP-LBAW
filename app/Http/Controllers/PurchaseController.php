<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Auth\Access\AuthorizationException;

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

    public function index(){
        try{
            $this->authorize('admin', Purchase::class);
        } catch(AuthorizationException $e){
            return back()->with('message', 'You are not an admin');
        }

        $purchases = Purchase::orderByRaw("
            CASE
                WHEN delivery_progress = 'Processing' THEN 1
                WHEN delivery_progress = 'Shipped' THEN 2
                WHEN delivery_progress = 'Delivered' then 3
                ELSE 4
            END
        ")->paginate(10);

        return view('purchases.index', [
            'purchases' => $purchases
        ]);
    }

    public function update(Purchase $purchase){
        try{
            $this->authorize('admin', Purchase::class);
        } catch(AuthorizationException $e){
            return back()->with('message', 'You are not an admin');
        }

        $formFields = request()->validate([
            'delivery_progress' => ['required', 'in:Processing,Shipped,Delivered'],
        ]);
        $purchase->update($formFields);

        return back()->with('message', 'Order updated');
    }
}
