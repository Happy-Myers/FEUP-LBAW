<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller {
    /*
     private function getCartInfo($productId = null){
          $entry = User::select('id')
              ->where('user_id', '=', Auth::id())
              ->first();
      
          $cart = Cart::where('user_id', '=', $entry->id)
              ->where('isactive', '=', true)
              ->first();
      
          $cartEntries = Cart::where('cart_id', '=', $cart->id);
      
          if($productId) {
              $cartEntries->where('product_id', '=', $productId);
          }
      
          return $cartEntries->get();
          
      }
      */
     public function index(){
          /*
          $user = User::find(Auth::id());
          $products = $this->getCartInfo();
          $cart = array();
          $total = 0;

          foreach($products as $product){
            $product = Product::find($product->_product_id);
            array_push( $cart, [ 'product' => $product, 'quantity' => $product->quantity ]);
            $total += $product->price * $product->quantity;
          }
      
          return view('users.cart', [
            'user' => $user,
            'cart' => $cart,
            'total' => $total,
          ]);
          */

          return view('users.cart', [
               'user' => 1,
               'cart' => 1,
               'total' => 500,
             ]);
     }
     
     public function add(){

     }

     public function delete(){

     }

     public function increment(){

     }

     public function decremet(){

     }
}
