<x-layout>
     <div class="100hv m-5">
         <div class="row mb-2">
             <h4 class="text-white">Your Cart</h4>
         </div>
         <section class="d-flex justify-content-around">
             <table class="table">
                 <thead>
                    <tr class="text-center">
                        <th scope="col">Remove</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Price</th>
                    </tr>
                 </thead>
                 <tbody>
                     <!-- foreach de produtos aqui -->
                     @foreach ($carts as $cart)
                        <x-cart-product :cart="$cart"/>
                     @endforeach
                 </tbody>
             </table>
 
             <div class="checkout w-25 ms-5">
               <div class="card-body d-flex justify-content-between">
                   <div class="d-flex flex-row">
                       <h5 class="card-title m-3 text-white">Total:</h5>
                       <h5 class="card-subtitle mt-3 text-white">{{$total}}€</h5>
                   </div>
               </div>
           
               <div class="d-flex justify-content-center align-items-center">
                   <form>
                       <div class="button1">
                           <a href="#">Checkout</a>
                       </div>
                   </form>
           
                   <form class="m-2" method="POST" action="/cart"> 
                        @csrf
                        @method('DELETE')
                       <button class="button2" type="submit">
                           Clear Cart
                       </button>
                   </form>
               </div>
           </div>
           
         </section>
     </div>
 </x-layout>
 