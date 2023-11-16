<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }

    public function review_vote(): BelongsToMany{
        return $this->belongsToMany(User::class, 'review_vote', 'review_id', 'user_id')->using(ReviewVote::class)->withPivot('vote');
    }
}
