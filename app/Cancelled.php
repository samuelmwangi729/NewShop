<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancelled extends Model
{
    protected $fillable=[
        'TransactionType',
        'OrderId',
        'MechantId',
        'CheckOutRequestId',
        'MSISDN',
        'FirstName',
        'Email',
        'LastName',
        'Status',
    ];
}
