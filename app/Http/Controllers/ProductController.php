<?php

namespace App\Http\Controllers;
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
    

    public function show(Product $product){
        $reviews = $product->reviews()->whereNotNull('comment')->get();

        return view('products.show', [
            'product' => $product,
            'reviews' => $reviews, 
        ]);
    }
    
}
