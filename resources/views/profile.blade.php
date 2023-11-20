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
                    <div class="card-header" style="background-color: #00101C; color: white;">
                        Saved Addresses
                    </div>

                    <div class="card-body" style="background-color: #001C30; color: white;">
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
