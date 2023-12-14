<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

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

    public function carts(): BelongsToMany{
        return $this->belongsToMany(User::class, 'cart')->using(Cart::class)->withPivot('quantity');
    }
    
    public function wishlist(): BelongsToMany{
        return $this->belongsToMany(User::class, 'wishlist');
    }

    public function purchases(): HasMany{
        return $this->hasMany(Product::class);
    }

    public function scopeFilter($query, array $filters){
        if($filters['category'] ?? false){
            $query->whereHas('categories', function($query){
                $query->where('name', 'ilike', '%' . request('category') . '%');
            });
        }

        if($filters['search'] ?? false){
            $query->where(function ($query) {
                $query->where('name', 'ilike', '%' . request('search') . '%')
                    ->orWhere('description', 'ilike', '%' . request('search') . '%')
                    ->orWhereHas('platform', function($query){
                        $query->where('name','ilike', '%' .request('search') . '%');})
                    ->orWhereHas('categories', function($query){
                        $query->where('name','ilike', '%' .request('search') . '%');
                    });
            });
        }
    }
}
