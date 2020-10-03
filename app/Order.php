<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable=[
        'OrderNumber',
        'Client',
        'Status',
        'DatePlaced',
        'DateSent',
        'DateReceived',
    ];
}
