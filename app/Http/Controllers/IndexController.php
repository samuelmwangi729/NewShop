<?php

namespace App\Http\Controllers;
use Auth;
use Str;
use Hash;
use Session;
use App\{Visitors,User,Cart,Wishlist,Term,Privacy,Returns,Order,Shop,MpesaTransactions,Product,Brand,Category,Country,Pickup,Collection,ReturningVisitors};
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected function getTemp(){
        $status=Auth::user();
        return $status;
        if($status==1){
            session(['Username'=>Auth::user()->email]);
            return Auth::user()->email;
        }
        if(Session::has('Username')){
            return Session::get('Username');
        }
        if($status==0 && Session::get('Username')==''){
            $username=Str::random(10);
            session(['Username'=>$username]);
            return $username;
        }
    }

    protected function isLoggedIn(){
        $status=Auth::check();
        if($status==1){
            $data=['isLoggedIn'=>['true']];
            return $data;
        }else{
            $data=['isLoggedIn'=>['false']];
            return $data;
        }
    }
    protected function GenRand(){
        $random=Str::random(10);
        return $random;
    }
    public function Welcome(){
        //whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
  $ip_address = $_SERVER['HTTP_CLIENT_IP'];
}
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
  $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
//whether ip is from remote address
else
{
  $ip_address = $_SERVER['REMOTE_ADDR'];
}
$visitorId=Str::random(10);
//find the ip in the database
$ip=Visitors::where('VisitorIp','=',$ip_address)->get()->first();
if(is_null($ip)){
    Visitors::create([
        'VisitorId'=>$visitorId,
        'VisitorIp'=>$ip_address,
        'DateVisited'=>date('Y-m-d'),
        'VisitorEmail'=>'Null'
    ]);
    session(['VisitorId'=>$visitorId]);
}else{
    //means that the visitor came back
    ReturningVisitors::create([
        'VisitorId'=>$ip->VisitorId,
        'VisitorIp'=>$ip_address,
        'DateVisited'=>date('Y-m-d'),
        'VisitorEmail'=>'Null'
    ]);
    session(['VisitorId'=>$ip->VisitorId]);

}
        return view('welcome');
    }

    public function createUser(Request $request){
        $this->validate($request,[
            'Town' => 'required',
            'County' => 'required',
        ]);
        // return $request->email;
        $user=User::where('email','=',Auth::user()->email)->get()->first();
        // return $user;
        $user->County=$request->County;
        $user->Town=$request->Town;
        $user->save();
        $data=['status'=>'success','message'=>'User Data Successfully Updated'];
        return $data;
        if ($user) {
            //update user cart, wishlist,
            $cart=Cart::where([
                ['User','=',Session::get('Username')],
                ['Status','=','0']
            ])->get();
            // dd($cart);
            if(!is_null($cart)){
                for ($i=0; $i < count($cart); $i++) {
                    $cart[$i]->User=$request->email;
                    $cart[$i]->save();
                }
            }
             //check if they have a wishlisted item item
             $wishlist=Wishlist::where([
                ['User','=',Session::get('Username')],
                ['Status','=','0']
            ])->get();
            // dd($wishlist);
            if(!is_null($wishlist)){
                for ($i=0; $i < count($wishlist); $i++) {
                    $wishlist[$i]->User=$request->email;
                    $wishlist[$i]->save();
                }
            }
            $request->session()->forget('Username');
            //set username to new email
            session(['Username'=>$request->email]);
        }
        $username=Session::get('Username');
         $carts=Cart::where('User','=',$username)->get();
         for($i=0;$i<count($carts);$i++){
             $carts[$i]->User=$request->email;
             $carts[$i]->save();
         }
         $request->session()->forget('Username');
         session(['Username'=>$request->email]);
        if($user){
            $data=['success'=>'user successfully registered'];
            return $data;
        }else{
            $data=['error'=>'user could not be registered'];
            return $data;
        }
    }
    protected function Contact(){
        return view('Shop.Contact');
    }
    protected function getUser(){
        return Auth::user();
    }
    protected function promotion(){
        return view('Shop.promotion');
    }
    protected function Terms(){
        $terms=Term::all();
        return view('Shop.Terms')->with('Terms',$terms);
    }
    protected function Privacy(){
        $Policy=Privacy::all();
        return view('Shop.Privacy')->with('Policy',$Policy);
    }
    protected function RPolicy(){
        $returns=Returns::all();
        return view('Shop.ReturnPolicy')->with('Returns',$returns);
    }
    protected function loadVisitors(){
        return Visitors::count();
    }
    protected function loadUsers(){
        return User::count();
    }
    protected function loadTodaysVisitors(){
        return count(Visitors::where('DateVisited','=',date('Y-m-d'))->get());
    }
    protected function getOrders(){
        return Order::count();
    }
    protected function getShops(){
        return Shop::count();
    }
    protected function getPayments(){
        //payments
        $sum=0;
        $mpesa=MpesaTransactions::all();
        for ($i=0; $i <MpesaTransactions::count() ; $i++) {
            //do a count here
            $sum=$sum+$mpesa[$i]->TransAmount;
        }
        return $sum;
    }
    protected function getProducts(){
        return Product::count();
    }
    protected function getProcessed(){
        $orders=Order::where('Status','=',1)->get();
        return count($orders);
    }
    protected function getunProcessed(){
        $orders=Order::where('Status','=',0)->get();
        return count($orders);
    }
    protected function ApprovedShops(){
        $shops=Shop::where('ShopStatus','=',1)->get();
        return count($shops);
    }
    protected function getBrands(){
        return Brand::count();
    }
    protected function getCategory(){
        return Category::count();
    }
    protected function getLocations(){
        return Country::count();
    }
    protected function Pickup(){
        return Pickup::count();
    }
    protected function getCollections(){
        return Collection::count();
    }
    protected function fetchVisitors(){
        return Visitors::all();
    }
    protected function fetchReturningVisitors(){
        return ReturningVisitors::all();
    }
}
