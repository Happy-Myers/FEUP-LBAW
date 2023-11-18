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

    protected $fillable = ['name', 'stock', 'price', 'score', 'description', 'hardware', 'publication_date'];

    public function platform(): BelongsTo{
        return $this->belongsTo(Platform::class);
    }

    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category::class);
    }

    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function cart(): BelongsToMany{
        return $this->belongsToMany(User::class, 'cart', 'product_id', 'user_id')->using(Cart::class)->withPivot('quantity');
    }
    
    public function wishlist(): BelongsToMany{
        return $this->belongsToMany(User::class, 'wishlist');
    }

    public function product_purchase(): BelongsToMany{
        return $this->belongsToMany(Purchase::class, 'product_purchase', 'product_id', 'purchase_id')->using(ProductPurchase::class)->withPivot('quantity');
    }
}
