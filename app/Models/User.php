<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Added to define Eloquent relationships.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        return $this->belongsToMany(Product::class, 'cart')->using(Cart::class)->withPivot('quantity');
    }

    public function wishlist(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'wishlist');
    }

    public function purchases(): HasMany{
        return $this->hasMany(Purchase::class);
    }

    public function notification(): HasMany{
        return $this->hasMany(Notification::class);
    }

    public function hasRole($role): bool {
        return $this->permission == $role;
    }
}
