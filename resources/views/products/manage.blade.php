<x-layout>
    <div class="container text-white">
        <h1>Product Management</h1>
        <div class="mb-3">
            <a href="/products/new" class="btn btn-primary">Create Product</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Platform</th>
                    <th>Categories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{asset('images/products/' . $product->image)}}" alt="{{ $product->name }}" width="120"></td>
                        <td><a href="/products/{{$product->id}}">{{ $product->name }}</a></td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->platform->name }}</td>
                        <td>
                            {{$product->categories->pluck('name')->take(2)->implode(', ')}}
                        </td>
                        <td>
                            <a href="/products/{{$product->id}}/edit" class="btn btn-warning">Edit</a>
                            <form action="/products/{{$product->id}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
</x-layout>