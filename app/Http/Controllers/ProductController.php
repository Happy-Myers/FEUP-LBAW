<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller {

    public function index(){
        $topProducts = Product::orderBy('score', 'desc')->take(4)->get();
        $otherProducts = Product::latest()->filter(request(['category', 'search']))->paginate(8);
        $categories = Category::all();
    
        return view('products.index', [
            'topProducts' => $topProducts,
            'otherProducts' => $otherProducts,
            'categories' => $categories,
        ]);
    }
    

    public function show($id){
        $product = Product::findOrFail($id);
        $product->load('platform', 'categories', 'reviews', 'cart', 'wishlist', 'product_purchase');

        $reviews = Review::get()->where('product_id', $id)->whereNotNull('comment');

        return view('products.show', [
            'product' => $product,
            'reviews' => $reviews, 
        ]);
    }
    
}
