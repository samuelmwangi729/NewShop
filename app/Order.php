<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable=[
        'OrderNumber',
        'Client',
        'Pickup',
        'Status',
        'DatePlaced',
        'DateSent',
        'DateReceived',
    ];
}
