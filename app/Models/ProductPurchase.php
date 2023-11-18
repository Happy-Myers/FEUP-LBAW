<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPurchase extends Pivot{
    use HasFactory;
    protected $table = 'product_purchase';
    public $timestamps = false;
    protected $fillable = ['quantity'];
}