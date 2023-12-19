<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Auth\Access\AuthorizationException;

class PurchaseController extends Controller
{
    public function store()
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

        foreach ($cart as $product) {
            $total = $product->pivot->quantity * $product->price;
            $addressId = request()->input('addressId');
            if (!$user->addresses->contains($addressId)) {
                return back()->with('message', 'Invalid address selected.');
            }
            $fields = [
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $product->pivot->quantity,
                'total' => $total,
                'address_id' => $addressId,
            ];
            Purchase::create($fields);
        }

        $user->cart()->detach();

        return redirect('/')->with('message', 'Purchase has been completed!');
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
