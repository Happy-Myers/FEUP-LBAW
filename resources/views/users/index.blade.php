<x-layout>
    <div class="row text-white m-4">
        <h1>Manage Users</h1>

        <div class="col-md-6">
            <h2>Active Users</h2>
            
            {{-- Search Bar for Active Users --}}
            <form method="get" action="admin/users">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Active Users" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><a href="users/{{$user->id}}">{{ $user->name }}</a></td>
                            <td>
                                <form method="post" action="users/{{$user->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">Ban</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>

        <div class="col-md-6">
            <h2>Banned Users</h2>

            {{-- Search Bar for Banned Users --}}
            <form method="get" action="admin/users">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Banned Users" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banned as $user)
                        <tr>
                            <td><a href="users/{{$user->id}}">{{ $user->name }}</a></td>
                            <td>
                                <form method="post" action="users/{{$user->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Unban</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $banned->links() }}
        </div>
    </div>
</x-layout>
