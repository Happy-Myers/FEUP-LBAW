<x-layout>
    @include('components.carousel')
    <div class="vh-100 maingrid">
        <h2 class="highlights">Highlights</h2>
        <div class="container-fluid mt-4" id="homeProductGrid">
            @foreach($productsList as $product)
                <div>
                    @include('components.card', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
