<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logins extends Model
{
    protected $fillable=[
        'Ip','Email'
    ];
}
