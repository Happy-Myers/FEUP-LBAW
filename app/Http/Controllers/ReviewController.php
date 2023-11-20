<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show(){
        return view('review',[
            'review' => Review::find(2)
        ]);
    }

    public function store(){
        $formFields = request()->validate([
            'product_id' => 'required',
            'score' => ['required', 'integer', 'between:1,5'],
            'comment' => ['nullable', 'string', 'max:200'],
        ]);

        $formFields['user_id'] = auth()->id();

        $formFields['date'] = now();

        Review::create($formFields);

        return back();
    }

    public function destroy(Review $review){
        if($review->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $review->delete();
        return back();
    }
}
