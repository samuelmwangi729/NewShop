<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable=[
        'Title',
        'Description',
        'Image',
        'Status'
    ];
}
