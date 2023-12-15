@props(['review'])

@php
    use Carbon\Carbon;
    $date = Carbon::parse($review->date)->format('d/m/Y');
    $user = $review->user;
@endphp


<div class="card-body">
    <div class="d-flex align-items-center">
        <img src="{{asset($user->image ? 'storage/' . $user->image : 'images/users/no-image.png')}}" alt="Reviewer" class="img-fluid rounded-circle" style="width: 50px;">
        <div class="ms-3">
            <h4 class="text-white align-middle mb-0">{{$user->name}}</h4>
        </div>
        <div class="ms-3">
            <small class="text-white align-middle">{{$date}}</small>
        </div>
        <div class="ms-auto">
            <div class="d-flex flex-row align-items-end">
                <strong class="text-white">Score: </strong>
                <span class="text-warning">
                    <i class="fas fa-star"></i>
                </span>
                <span class="text-warning">
                    <i class="fa{{$review->score >=2 ? 's' : 'r'}} fa-star"></i>
                </span>
                <span class="text-warning">
                    <i class="fa{{$review->score >=3 ? 's' : 'r'}} fa-star"></i>
                </span>
                <span class="text-warning">
                    <i class="fa{{$review->score >=4 ? 's' : 'r'}} fa-star"></i>
                </span>
                <span class="text-warning">
                    <i class="fa{{$review->score ==5 ? 's' : 'r'}} fa-star"></i>
                </span>
            </div>
        </div>
        @can('delete', $review)
        <form method="POST" action="/reviews/{{$review->id}}" class="mb-3">
            @csrf
            @method('DELETE')
            <button class="btn text-danger" type="submit">
                <i class="fas fa-trash"></i>
            </button>
        </form>
        @endcan
    </div>
    <div class="mt-2">
        <p class="mb-0 text-white">
            {{$review->comment}}
        </p>
    </div>
</div>
        