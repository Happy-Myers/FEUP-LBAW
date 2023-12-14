<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends Controller
{
    public function store(){
        $formFields = request()->validate([
            'product_id' => 'required',
            'score' => ['required', 'integer', 'between:1,5'],
            'comment' => ['nullable', 'string', 'max:200'],
        ]);

        $formFields['user_id'] = auth()->id();

        $formFields['date'] = now();

        $review = Review::where('product_id', $formFields['product_id'])
            ->where('user_id', $formFields['user_id'])->first();
        
        if($review == null)    
            Review::create($formFields);
        else
            $review->update($formFields);

        return back();
    }

    public function destroy(Review $review){
        if($review->user_id != auth()->id() && !(auth()->check() && auth()->user()->hasRole('Admin'))){
            return back()->with('message', 'You can only delete your own reviews');
        }

        $review->delete();
        return back();
    }
}
