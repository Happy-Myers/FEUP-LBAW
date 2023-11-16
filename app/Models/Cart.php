<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot{
    protected $table = 'cart';

    public $timestamps = false;

    protected $fillable = ['quantity'];
}