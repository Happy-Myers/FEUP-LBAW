<x-layout>
    <div class="container text-white">
        <h1>Order Management</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Address</th>
                    <th>Product Name</th>
                    <th>Amount Bought</th>
                    <th>Total Price</th>
                    <th>Delivery Progress</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>
                            @if($purchase->user!= NULL)
                                <a href="/users/{{$purchase->user->id}}">{{$purchase->user->name}}</a>
                            @else
                                Deleted User
                            @endif
                        </td>
                        <td>{{ $purchase->address->street }} {{ $purchase->address->city }} {{ $purchase->address->postal_code }} </td>
                        <td>
                            @if($purchase->product != NULL)
                                <a href="/products/{{$purchase->product->id}}">{{$purchase->product->name}}</a>
                            @else
                                Deleted Product
                            @endif
                        </td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ $purchase->total }}</td>
                        <td>
                            <form method="post" action="/admin/orders/{{$purchase->id}}">
                                @csrf
                                @method('patch')
                                <select name="delivery_progress" onchange="this.form.submit()">
                                    <option value="Processing" {{ $purchase->delivery_progress == 'Processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="Shipped" {{ $purchase->delivery_progress == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="Delivered" {{ $purchase->delivery_progress == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$purchases->links()}}
    </div>
</x-layout>