<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

<x-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header" style="background-color: #00101C; color: white;">
                        Profile
                    </div>

                    <div class="card-body" style="background-color: #001C30; color: white;">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Profile Picture -->
                                <img src="{{ asset('path/to/profile-pic.jpg') }}" alt="Profile Picture" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-md-8">
                                <!-- User Details -->
                                <h3 class="mb-2">{{ $user->name }}</h3>
                                <p class="mb-0" style="font-weight: bold;">Username:</p>
                                <p class="mb-2">{{ $user->name }}</p>
                                <p class="mb-0" style="font-weight: bold;">E-mail:</p>
                                <p class="mb-4">{{ $user->email }}</p>
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

                <div class="card mt-3 mb-5" >
                    <div class="card-header" style="background-color: #00101C; color: white; display: flex; justify-content: space-between; vertical-align: center;">
                        Saved Addresses
                        <button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#addAddressModal" style="color: white;">
                            +
                        </button>
                    </div>
                    @foreach($user->addresses as $address)
                        <div class="card-body" style="background-color: #001C30; color: white;">
                            <div class="address-box">
                                <h5>{{ $address->label }}</h5>
                                <p>{{ $address->street }} {{ $address->city }} {{ $address->postal_code }}</p>
                                <form method="post" action="/addresses/{{$address->id}}"> 
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary btn-sm"> Save </button>
                                </form> 
                            
                                <form method="post" action="/addresses/{{ $address->id }}"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary btn-sm"> Remove </button>
                                </form> 
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
