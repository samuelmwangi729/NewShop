<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $fillable=[
        'VisitorId','VisitorIp','VisitorEmail'
    ];
}
