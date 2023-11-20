<div class="row">
    <div class="col-md-12">
        <div class="card bg-dark text-white border border-white mt-5">
            <div class="card-body">
                <form method="POST" action="/reviews" id="reviewForm">
                    @csrf
                    <div class="d-flex justify-content-end align-items-center">
                        <strong class="text-white">Score: </strong>
                        <span class="text-warning stars" data-score="0">
                            <i class="far fa-star star" data-value="1"></i>
                            <i class="far fa-star star" data-value="2"></i>
                            <i class="far fa-star star" data-value="3"></i>
                            <i class="far fa-star star" data-value="4"></i>
                            <i class="far fa-star star" data-value="5"></i>
                        </span>
                        <span id="selectedScore" class="text-white ms-2">0 / 5</span>
                        <input type="hidden" id="score" name="score" value="0"/>
                        @error('score')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="comment" class="text-white">Comment:</label>
                        <textarea class="form-control" id="comment" name="comment" rows="4" maxlength="200" required></textarea>
                        <div id="charCount" class="text-white text-end mt-1">200</div>
                    </div>
                    <div>
                        <button type="submit" class="buy">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>
