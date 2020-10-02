<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'Category','Slug','Status'
    ];

    //defining te relationships
    public function subcategory(){
        return $this->hasMany('App\SubCategories');
    }
}
