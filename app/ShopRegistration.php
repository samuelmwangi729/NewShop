<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopRegistration extends Model
{
    protected $fillable=[
        'ShopNumber',
        'Status',
        'Plan',
        'Amount'
    ];
}
