<x-layout>
    <div class="pb-4 product">
        <h1 class="card-title mt-3 ms-4">
            {{ $product->name }}
            @if($product->platform->name !== 'PC')
                <span class="platform-info">({{ $product->platform->name }})</span>
            @endif
        </h1>        
        <div class="images">
            <img src="{{ asset('images/godofwar.jpg') }}" class="img-fluid" alt="IMG1">
        </div>
        <div class="details"> 
            <img src="{{ asset('images/assassinscreed.jpg') }}" class="img-fluid" alt="IMG1">
            <h3 class="mt-3 mb-2">Product Description</h3>
            <p class="card-text">{{ $product->description }}</p>

            <h6 class="card-text"><strong>Price:</strong> {{ $product->price }}€</h6>
            <h6 class="card-text"><strong>Release Date:</strong> {{ $product->publication_date }}</h6>
            <h6 class="card-text"><strong>Score:</strong> 
                @for ($i = 1; $i <= 5; $i++)
                  @if ($i <= $product->score)
                    &#9733;
                  @else
                    &#9734;
                  @endif
                @endfor
            </h6>
            <h6 class="card-text">
                <strong>Stock:</strong> 
                @if ($product->stock >= 1)
                  Available
                @else
                  Out of stock
                @endif
            </h6>  
            <h6 class="card-text">
                <strong>Genres:</strong>
                @foreach ($product->categories as $category)
                  {{ $category->name }}
                  @if (!$loop->last)
                    ,
                  @endif
                @endforeach
            </h6>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-3 buttons"> <!-- Falta adicionar função aos botões -->
          <form method="POST" action="/cart/{{$product->id}}">
            @csrf
            <button type="submit" class="btn btn-primary buy me-2">Add To Cart</button>
          </form>
            
            <button class="btn btn-primary buy ms-2">Add To Wishlist</button>
        </div>
    </div>
</x-layout>