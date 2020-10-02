<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[
        'ProductSKU',
        'User',
        'Qty',
        'Status'
    ];
}
