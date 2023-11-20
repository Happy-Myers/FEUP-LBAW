<x-layout>
    <div class="container mt-5">
        @include('partials.review-form')
        @unless($review == null)
        <x-review :review="$review"/>
        @endunless
    </div>
</x-layout>