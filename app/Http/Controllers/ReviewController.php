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
}
