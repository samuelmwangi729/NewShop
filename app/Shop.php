<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable=[
        'ShopNumber',
        'ShopName',
        'ShopLogo',
        'ShopPin',
        'ShopAddress',
        'ShopCounty',
        'ShopTown',
        'ShopPhoneNumber',
        'ShopAcceptable',
        'ShopMpesa',
        'ShopBank',
        'ShopBankAccount',
        'ShopOwner',
        'ShopStatus',
    ];
}
