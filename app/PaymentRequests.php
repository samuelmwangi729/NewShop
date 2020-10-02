<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequests extends Model
{
    protected $fillable=[
        'MerchantRequestID',
        'CheckoutRequestID',
        'ResponseCode',
        'ResponseDescription',
        'CustomerMessage',
        'user',
        'Phone',
    ];
}
