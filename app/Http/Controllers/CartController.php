<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Validation\ValidationException;

class CartController extends Controller {
  public function index(){
    $addresses = auth()->user()->addresses;
    $carts = auth()->user()->cart;
    $total = 0;
    foreach($carts as $cart){
      $total += $cart->pivot->quantity * $cart->price;
    }

    return view('users.cart', [
      'carts' => $carts,
      'total' => $total,
      'addresses' => $addresses
    ]);
  }
  
  public function store(Product $product){
    $user = auth()->user();
    $cart = $user->cart()->where('product_id', $product->id)->first();

    if(!$cart){
      $user->cart()->attach($product->id, ['quantity' => 1]);
    }
    else{
      $cart->pivot->update(['quantity' => $cart->pivot->quantity + 1]);
    }

    return back()->with('message', 'Product added to cart!');
  }
  
  public function destroy(Product $product){
    auth()->user()->cart()->detach($product->id);
    return back()->with('message', 'Product remove from cart!');
  }

  public function clear(){
    auth()->user()->cart()->detach();
    return back()->with('message', 'Cart cleared successfully!');
  }

  public function update(Product $product){
    try{
    $quantity = request()->validate([
      'quantity' => ['required', 'numeric', 'min:1']
    ]);
    $user = auth()->user();

    $cart = $user->cart()->where('product_id', $product->id)->first();
    if($cart){
      $cart->pivot->update($quantity);

      return response()->json(['message' => 'Quantity updated successfully', 'price' => $product->price], 200);
    }

    return response()->json(['message' => 'Cart item not found'], 404);
    } catch(ValidationException $e){
      return response()->json(['errors' => $e->errors()], 422);
    }
  }
}
