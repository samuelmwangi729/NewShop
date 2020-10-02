<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Session;

class WishlistController extends Controller
{
    protected function index(){
        return view('Shop.Wishlist');
    }
    protected function destroy($sku){
        $username=Session::get('Username');
        $prod=Wishlist::where([
            ['ProductSKU','=',$sku],
            ['User','=',$username],
        ])->get()->first();
        //if the product exists, delete it
        if($prod){
            $prod->delete();
            return "true";
        }
        else{
            return "false";
        }
    }
}
