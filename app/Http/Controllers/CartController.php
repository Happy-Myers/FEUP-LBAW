<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller {
  public function index(){
    $carts = auth()->user()->cart;
    $total = 0;
    foreach($carts as $cart){
      $total += $cart->pivot->quantity * $cart->price;
    }

    return view('users.cart', [
      'carts' => $carts,
      'total' => $total
    ]);
  }
  
  public function create(Product $product){
    $user = auth()->user();
    $cart = $user->cart()->where('product_id', $product->id)->get();

    if($cart->isempty()){
      $user->cart()->attach($product->id, ['quantity' => 1]);
    }
    else{
      $cart[0]->pivot->update(['quantity' => $cart[0]->pivot->quantity + 1]);
    }

    return back();
  }
  
  public function destroy(Product $product){
    auth()->user()->cart()->detach($product->id);
    return back();
  }

  public function clear(){
    auth()->user()->cart()->detach();
    return back();
  }
}
