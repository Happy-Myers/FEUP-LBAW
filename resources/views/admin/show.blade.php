<x-layout>
    <div class="container mt-4 text-white">
        <ul>
            <li>
                <div>
                    <h1>Total Products</h1>
                    <p>{{$products}}</p>
                </div>
            </li>
            <li>
                <div>
                    <h1>Total Categories</h1>
                    <p>{{$categories}}</p>
                </div>
            </li>
            <li>
                <div>
                    <h1>Total Orders</h1>
                    <p>{{$orders}}</p>
                </div>
            </li>
            <li>
                <div>
                    <h1>Total Users</h1>
                    <p>{{$users}}</p>
                </div>
            </li>
        </ul>
    </div>
</x-layout>