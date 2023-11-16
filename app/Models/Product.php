<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function platform(): BelongsTo{
        return $this->belongsTo(Platform::class);
    }

    public function categories(): HasMany{
        return $this->hasMany(Category::class);
    }

    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function cart(): BelongsToMany{
        return $this->belongsToMany(User::class, 'cart', 'product_id', 'user_id')->using(Cart::class)->withPivot('quantity');
    }
    
    public function wishlist(): HasMany{
        return $this->hasMany(User::class);
    }

    public function product_purchase(): BelongsToMany{
        return $this->belongsToMany(Purchase::class, 'product_purchase', 'product_id', 'purchase_id')->using(ProductPurchase::class)->withPivot('quantity');
    }
}
