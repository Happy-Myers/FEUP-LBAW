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
                                <img src="{{ asset('path/to/profile-pic.jpg') }}" alt="Profile Picture" class="img-fluid rounded-circle">
                            </div>
                            <div class="details2 col">
                                <!-- User Details -->
                                <h3 class="mb-2">{{ $user->name }}</h3>
                                <p class="mb-0">Username:</p>
                                <p class="mb-2">{{ $user->name }}</p>
                                <p class="mb-0">E-mail:</p>
                                <p class="mb-4">{{ $user->email }}</p>
                                <div class="buttons">
                                    <div class="d-inline-block mr-2">
                                        <a href="#" class="btn btn-info">
                                            <div class="d-flex align-items-center">
                                                Edit Profile
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-inline-block">
                                        <a href="#" class="btn btn-danger">
                                            <div class="d-flex align-items-center">
                                                Delete Account
                                            </div>
                                        </a>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>

                 </div>

                 <div class="card2 mt-3 mb-5" >
                    <div class="special">
                        Saved Addresses
                        <button type="button" class="navbar-toggler btn btn-link btn-lg" data-bs-toggle="collapse" data-bs-target="#addAddress" aria-controls="addAddress" aria-expanded="false" aria-label="Toggle navigation"style="color: white;">
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
                                        <input class="form-control me-2" type="text" name="label" placeholder="Label">
                                        <input class="form-control me-2" type="text" name="street" placeholder="Address">
                                        <input class="form-control me-2" type="text" name="city" placeholder="City">
                                        <input class="form-control me-2" type="text" name="postal_code" placeholder="Postal Code">
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
            </div>
        </div>
    </div>
</x-layout>
