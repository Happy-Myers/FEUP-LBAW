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
                        </div>
                    </div>

                 </div>

                <div class="card mt-3 mb-5" >
                    <div class="card-header" style="background-color: #00101C; color: white; display: flex; justify-content: space-between; vertical-align: center;">
                        Saved Addresses
                        <button type="button" class="navbar-toggler btn btn-link btn-lg" data-bs-toggle="collapse" data-bs-target="#addAddress" aria-controls="addAddress" aria-expanded="false" aria-label="Toggle navigation"style="color: white;">
                            +
                        </button>
                    </div>
                    @foreach($user->addresses as $address)
                        <div class="card-body" style="background-color: #001C30; color: white;">
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
                    <form method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
