<x-layout>
    <div class="container mt-5">
        @include('partials.review-form')
        <x-review :review="$review"/>
    </div>
</x-layout>