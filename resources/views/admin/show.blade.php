<x-layout>
    <div class="container mt-4 text-white">
        <ul>
            <li>
                    <a href ="admin/products" class ="btn">
                            <h1>Total Products</h1>
                            <p>{{$products}}</p>
                    </a>
            </li>
            <li>
                <a href="admin/orders" class="btn">
                    <h1>Total Orders</h1>
                    <p>{{$orders}}</p>
                </a>
            </li>
            <li>
                <a href="admin/users" class="btn">
                    <h1>Total Users</h1>
                    <p>{{$users}}</p>
                </a>
            </li>
        </ul>
    </div>
</x-layout>