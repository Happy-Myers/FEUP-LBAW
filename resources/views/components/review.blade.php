@props(['review'])

@php
    use Carbon\Carbon;
    $date = Carbon::parse($review->date)->format('d/m/Y');
    $user = $review->user;
@endphp


<div class="row">
    <div class="col-md-12">
        <div class="card bg-dark text-white border border-white m-5">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('/images/users/no-image.png') }}" alt="Reviewer" class="img-fluid rounded-circle" style="width: 50px;">
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
                </div>
                <div class="mt-2">
                    <p class="mb-0 text-white">
                        {{$review->comment}}
                    </p>
                </div>
            </div>
        </div>    
    </div>
</div>
