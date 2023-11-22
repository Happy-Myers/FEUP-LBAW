<div class="card bg-dark">
     <div class="card m-1 h-100 bg-dark product-card">
          <div class="card-body bg-dark d-flex flex-column justify-content-center">
               <h5 class="card-title">
                    <a href="{{ url('products/'.$product->id) }}" class="text-decoration-none text-white">
                    {{ $product->name }}
                    </a>
               </h5>
               <div class="product-info mt-2">
                    <a href="{{ url('products/'.$product->id) }}">
                         <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    </a>

                    <div class="d-flex justify-content-center align-items-center mt-3 text-white">
                         <h4 class="price">{{ $product->price }}€</h4>
                    </div>
                    <div class="text-center mt-2">
                         <button class="btn btn-primary buy">Add To Cart</button>
                     </div>
               </div>
          </div>
     </div>
</div>
 