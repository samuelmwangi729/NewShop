<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturningVisitors extends Model
{
    protected $fillable=[
        'VisitorId','VisitorIp','DateVisited','VisitorEmail'
    ];
}
