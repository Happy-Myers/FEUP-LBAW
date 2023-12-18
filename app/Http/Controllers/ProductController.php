<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Auth\Access\AuthorizationException;

class ProductController extends Controller {

    public function index(){
        $search = request()->input('search');
        if(empty($search)){
            $otherProducts = Product::latest()->filter(request(['category']))->paginate(8);
        }
        else{
           $otherProducts = Product::search(request(['search']))->paginate(8); 
        }
        $topProducts = Product::orderBy('score', 'desc')->take(4)->get();
        
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

    public function manage(){
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('products.manage', [
            'products' => $products,
        ]);
    }
    
    public function destroy(Product $product){
        try{
            $this->authorize('admin', Product::class);
        }catch(AuthorizationException $e){
            return back()->with('message','You are not an admin');
        }

        $product->delete();

        return back()->with('message', 'Product deleted');
    }

    public function edit(Product $product){
        try{
            $this->authorize('admin', Product::class);
        } catch(AuthorizationException $e){
            return back()->with('message','You are not an admin');
        }

        return view('products.edit', [
            'product' => $product,
        ]);
    }

    public function update(Product $product)
    {
        try {
            $this->authorize('admin', Product::class);
        } catch (AuthorizationException $e) {
            return back()->with('message', 'You are not an admin');
        }
    
        $formFields = request()->validate([
            'name' => ['required', 'string', 'max:200'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'description' => ['required', 'string', 'max:300'],
            'platform' => ['required', 'exists:platforms,id'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:categories,id'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'image2' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
    
        $formFields['price'] = round($formFields['price'], 2);
    
        $newPlatformId = $formFields['platform'];
        $newCategoryIds = $formFields['categories'];
    
        $product->update(Arr::except($formFields, ['platform', 'categories']));

        $product->platform()->associate($newPlatformId)->save();
    
        $product->categories()->sync($newCategoryIds);
    
        if (request()->hasFile('image')) {
            $formFields['image'] = request()->file('image')->store('products', 'public');
            $product->image = $formFields['image'];
            $product->save();
        }
    
        if (request()->hasFile('image2')) {
            $formFields['image2'] = request()->file('image2')->store('products', 'public');
            $product->image2 = $formFields['image2'];
            $product->save();
        }

        return redirect('/admin/products')->with('message', 'Product updated successfully');
    }
    

    public function create(){
        try{
            $this->authorize('admin', Product::class);
        } catch(AuthorizationException $e){
            return back()->with('message','You are not an admin');
        }

        return view('products.create');
    }

    public function store(){}
}
