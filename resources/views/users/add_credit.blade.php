@php
    $cashAmounts = [5, 10, 20, 35, 50, 100];
@endphp

<x-layout>
    <h1>Buy More Credits</h1>
    <div>
        <ul>
            @foreach($cashAmounts as $amount)
                <li>
                    <form method="POST" action="/payment">
                        @csrf
                        <input type="hidden" name="price" value="{{$amount}}"/>
                        <button type="submit" class="btn">
                            <h1 class="text-white">{{$amount}} €</h1>
                        </button>
                    </form> 
                </li>
            @endforeach
        </ul>
    </div>  
</x-layout>