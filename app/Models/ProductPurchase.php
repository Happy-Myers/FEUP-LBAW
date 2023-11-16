<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductPurchase extends Pivot{
    protected $table = 'product_purchase';
    protected $fillable = ['quantity'];
}