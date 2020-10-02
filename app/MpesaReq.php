<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpesaReq extends Model
{
    protected $fillable=[
        'Transaction'
    ];
    protected $casts=[
        'Transaction'=>'array'
    ];
}
