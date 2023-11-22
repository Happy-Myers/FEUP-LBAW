<?php

namespace App\Http\Controllers;
use App\Models\Product;

class WishlistController extends Controller {
    
    public function index(){
        return view('users.wishlist',[
            'wishes' => auth()->user()->wishlist
        ]);
    }
    
    public function store(Product $product){
        $user = auth()->user();
        $wishlist = $user->wishlist()->where('product_id', $product->id)->first();

        if(!$wishlist){
            $user->wishlist()->attach($product->id);
        }
        else{
            return back()->with('message', 'product already in wishlist');
        }

        return back();
    }

    public function destroy(Product $product){  
        auth()->user()->wishlist()->detach($product->id);
        return back();
    }
}
