<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable=[
        'ProductSKU',
        'User',
        'Status'
    ];
}
