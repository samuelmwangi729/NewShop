<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'ProductName',
        'Slug',
        'ProductBrand',
        'ProductCategory',
        'ProductSubCategory',
        'ProductBanner',
        'FrontImage',
        'SideImage',
        'BackImage',
        'Price',
        'Discount',
        'FinalPrice',
        'SKU',
        'Qty',
        'Description',
        'Status',
        'Out',
        'HasCoupon',
        'Collection',
        'Tags',
        'Shop',
        'AddedBy',
        'ApprovedBy',
        'EditedBy',
    ];
}
