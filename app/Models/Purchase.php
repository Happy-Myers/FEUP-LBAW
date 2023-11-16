<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Purchase extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo{
        return $this->belongsTo(Address::class);
    }

    public function product_purchase(): BelongsToMany{
        return $this->belongsToMany(Product::class, 'product_purchase', 'purchase_id', 'product_id')->using(ProductPurchase::class)->withPivot('quantity');
    }
}
