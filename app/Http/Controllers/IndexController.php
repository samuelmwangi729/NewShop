<?php

namespace App\Http\Controllers;
use Auth;
use Str;
use Hash;
use Session;
use App\{Visitors,User,Cart,Wishlist};
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
    protected function Welcome(){
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
        'VisitorEmail'=>'Null'
    ]);
    session(['VisitorId'=>$visitorId]);
}
        return view('welcome');
    }

    public function createUser(Request $request){
        $this->validate($request,[
            'FirstName'=>['required', 'string', 'max:255'],
            'LastName'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=>['required', 'string', 'min:8', 'confirmed'],
            'Address' => 'required',
            'PhoneNumber' => 'required',
            'Town' => 'required',
            'County' => 'required',
        ]);
        // return $request->email;
        $user=User::create([
            'First_Name' => $request->FirstName,
            'Last_Name' => $request->LastName,
            'email' =>$request->email,
            'Level' => 'eZHq6QZzYAlsw5uewAi1Spn0ieOZxI5oh8M7mdd14',
            'Address' => $request->Address,
            'PhoneNumber' => $request->PhoneNumber,
            'Town' => $request->Town,
            'County' => $request->County,
            'Status' => 0,
            'password' => Hash::make($request->password),
        ]);
        session(['First_Name'=>$request->FirstName]);
        session(['Last_Name'=>$request->LastName]);
        session(['Email'=>$request->email]);
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
            $data=['success'=>'user successfully registered','firstName'=>Session::get('First_Name')];
            return $data;
        }else{
            $data=['error'=>'user could not be registered'];
            return $data;
        }
    }
    protected function Contact(){
        return view('Shop.Contact');
    }
}
