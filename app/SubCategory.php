<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $fillable=[
        'category_id','SubCategory','Status'
    ];
    public function category(){
        return  $this->belongsTo('App\Category');
    }
}
