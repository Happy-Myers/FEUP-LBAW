@php
    use Carbon\Carbon;
@endphp

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

<x-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card2">
                    <h2 class="card-header">
                        Profile
                    </h2>

                    <div class="card-body">
                        <div class="row">
                            <div class="profile-pic col">
                                <!-- Profile Picture -->
                                <img src="{{ asset($user->image ? 'storage/' . $user->image : 'images/users/no-image.png') }}" alt="Profile Picture" class="img-fluid rounded-circle">
                            </div>
                            <div class="details2 col">
                                <!-- User Details -->
                                <h3 class="mb-2">{{ $user->name }}</h3>
                                <p class="mb-0">Phone Number:</p>
                                <p class="mb-2">{{ $user->phone_number }}</p>
                                <p class="mb-0">E-mail:</p>
                                <p class="mb-4">{{ $user->email }}</p>
                                @auth
                                @if(auth()->id() == $user->id)
                                <div class="buttons">
                                    <div class="d-inline-block mr-2">
                                        <a href="edit" class="btn btn-info">
                                            <div class="d-flex align-items-center">
                                                Edit Profile
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-inline-block">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                            <div class="d-flex align-items-center">
                                                Delete Account
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                @endif
                                @endauth
                           </div>
                        </div>
                    </div>
                 </div>
                @auth
                @if(auth()->id() == $user->id)
                 <div class="card2 mt-3 mb-5" >
                    <div class="special">
                        Saved Addresses
                        <button type="button" class="navbar-toggler btn-lg" data-bs-toggle="collapse" data-bs-target="#addAddress" aria-controls="addAddress" aria-expanded="false" aria-label="Toggle navigation">
                            +
                        </button>
                    </div>
                    @foreach($user->addresses as $address)
                        <div class="card-body">
                            <div class="address-box">
                                <h5>{{ $address->label }}</h5>
                                <p>{{ $address->street }} {{ $address->city }} {{ $address->postal_code }}</p>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#editAddress" aria-controls="editAddress" aria-expanded="false" aria-label="Toggle navigation"> Edit </button>
                                <div class="collapse navbar-collapse justify-content-between" id="editAddress">
                                    <form class="d-flex mx-auto" method="post" action="/addresses/{{$address->id}}">
                                        @csrf
                                        @method('PUT')
                                        <input class="form-control me-2" type="text" name="label" placeholder="Label" value="{{$address->label}}">
                                        <input class="form-control me-2" type="text" name="street" placeholder="Address" value="{{$address->street}}">
                                        <input class="form-control me-2" type="text" name="city" placeholder="City" value="{{$address->city}}">
                                        <input class="form-control me-2" type="text" name="postal_code" placeholder="Postal Code" value="{{$address->postal_code}}">
                                        <button class="btn btn-outline-success" type="submit">Save</button>
                                    </form>
                                </div>                            
                                <form method="post" action="/addresses/{{ $address->id }}"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary btn-sm"> Remove </button>
                                </form> 
                            </div>
                        </div>
                    @endforeach
                    <div class="collapse navbar-collapse justify-content-between" id="addAddress">
                        <form class="d-flex mx-auto" method="post" action="/addresses">
                            @csrf
                            @method('POST')
                            <input class="form-control me-2" type="text" name="label" placeholder="Label">
                            <input class="form-control me-2" type="text" name="street" placeholder="Address">
                            <input class="form-control me-2" type="text" name="city" placeholder="City">
                            <input class="form-control me-2" type="text" name="postal_code" placeholder="Postal Code">
                            <button class="btn btn-outline-success" type="submit">Save</button>
                        </form>
                    </div>                            

                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete your account? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="post" action ="/users">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @auth
    @if(auth()->id() == $user->id)
    <div class="history">
        <h4 class="text-white">Your Shopping History</h4>
        <section class="d-flex justify-content-around">
            <table class="table">
                <thead>
                   <tr class="text-center">
                       <th scope="col">Product</th>
                       <th scope="col">Date</th>
                       <th scope="col">Status</th>
                       <th scope="col">Amount</th>
                       <th scope="col">Price</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                            @php
                                $date = Carbon::parse($purchase->date)->format('d/m/Y');
                            @endphp
                            <tr>
                                <td class="cart-entry">
                                    <span class="aux">{{$purchase->product->name}}</span>
                                </td>

                                <td class="cart-entry">
                                    <span class="aux">{{$date}}</span>
                                </td>
                                
                                <td class="cart-entry">
                                    <span class="aux">{{$purchase->delivery_progress}}</span>
                                </td>

                                <td class="cart-entry">
                                    <span class="aux">{{$purchase->quantity}}</span>
                                </td>
                            
                                <td class="cart-entry">
                                    <span class="aux">{{$purchase->total}}€</span>
                                </td>
                            </tr>	
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
    @endif
    @endauth

</x-layout>
