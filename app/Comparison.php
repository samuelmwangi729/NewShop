<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    protected $fillable=[
        'ProductSKU',
        'User',
        'Status'
    ];
}
