<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'address_id'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo{
        return $this->belongsTo(Address::class);
    }

    public function products(): BelongsToMany{
        return $this->belongsToMany(Product::class)->using(ProductPurchase::class)->withPivot('quantity');
    }
}
