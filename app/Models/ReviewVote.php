<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ReviewVote extends Pivot  {
    protected $table = 'review_vote';

    public $timestamps = false;

    protected $fillable = ['vote'];
}