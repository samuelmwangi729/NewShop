<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $fillable=[
        'TownId','StationName','Shipping','Status'
    ];
}
