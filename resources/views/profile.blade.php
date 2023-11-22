<x-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <h2 class="card-header">
                        Profile
                    </h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Profile Picture -->
                                <!-- <img src="{{ asset('path/to/profile-pic.jpg') }}" alt="Profile Picture" class="img-fluid rounded-circle"> -->
                                <img src="{{ asset('images/pikachu.jpg') }}" alt="Profile Picture" class="img-fluid w-200 h-200 rounded">

                            </div>
                            <div class="col details">
                                <!-- User Details -->
                                <h3 class="mb-2">{{ $user->name }}</h3>
                                <p class="mb-0">Username:</p>
                                <p class="mb-2">{{ $user->name }}</p>
                                <p class="mb-0">E-mail:</p>
                                <p class="mb-4">{{ $user->email }}</p>
                                <div class="align-buttons">
                                <div class="buttons">
                                    <a href="#" class="btn btn-info">
                                        <div class="d-flex align-items-center">
                                            Edit Profile
                                        </div>
                                    </a>
                                </div>
                                <div class="buttons">
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

                <div class="card mt-3 mb-5" >
                    <h2 class="card-header">
                        Saved Addresses
                    </h2>

                    <div class="card-body">
                        <div class="address-box">
                            <h4>{{ "title" }}</h4>
                            <p>{{ "address" }}</p>
                        </div>
                        <!-- Add more address boxes as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
