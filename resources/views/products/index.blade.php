@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column">
        <div class="container-fluid mt-5" id="homeProductGrid">
            @foreach($productsList as $product)
                @include('components.card', ['product' => $product])
            @endforeach
        </div>
    </div>
@endsection
