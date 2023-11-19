<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $productsList = array();

        for($i = 0; $i < 4; $i++){
            array_push($productsList, $products[rand(0, count($products) - 1)]);
        }

        return view('products.index', [
            'productsList' => $productsList,
            'breadcrumbs' => [],
            'current' => null
        ]);
    }
}
