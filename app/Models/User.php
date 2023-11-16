<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Added to define Eloquent relationships.
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        //'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the cards for a user.
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function review_vote(): BelongsToMany {
        return $this->belongsToMany(Review::class, 'review_vote', 'user_id', 'review_id')->using(ReviewVote::class)->withPivot('vote');
    }

    public function cart(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'cart', 'user_id', 'product_id')->using(Cart::class)->withPivot('quantity');
    }

    public function wishlist(): HasMany{
        return $this->hasMany(Product::class);
    }

    public function purchases(): HasMany{
        return $this->hasMany(Purchase::class);
    }
}
