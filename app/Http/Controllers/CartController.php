<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CartController extends Controller {
  public function index(){

    $user = User::find(auth()->id());
    $carts = $user->cart;
    $total = 0;
    foreach($carts as $cart){
      $total += $cart->pivot->quantity * $cart->price;
    }

    return view('users.cart', [
      'carts' => $carts,
      'total' => $total
    ]);
  }
  
  public function create(){
  
  }
  
  public function destroy(){
  
  }
}
