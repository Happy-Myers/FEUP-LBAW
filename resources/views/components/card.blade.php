<div class="card">
     <div class="card m-1 h-100 product-card">
          <div class="card-body d-flex flex-column justify-content-center">
               <h5 class="card-title">
                    <a href="{{ url('products/'.$product->id) }}" class="text-decoration-none text-dark">
                    {{ $product->name }}
                    </a>
               </h5>
               <div class="product-info mt-2">
                    <a href="{{ url('products/'.$product->id) }}">
                         <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    </a>

                    <div class="d-flex justify-content-center align-items-center">
                         <h4 class="price">{{ $product->price }}€</h4>
                    </div>
                    <button class="btn btn-primary">Add to Cart</button>
               </div>
          </div>
     </div>
</div>
 