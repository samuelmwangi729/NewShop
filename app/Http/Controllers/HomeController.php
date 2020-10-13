<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\{Visitors,Logins,Cart,Wishlist,ReturningVisitors};
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd(Session::get('intended'));
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
        Logins::create([
            'Ip'=>$ip_address,
            'Email'=>Auth::user()->email
        ]);

        if(Session::has('VisitorId')){
            $user=Visitors::where('VisitorId','=',Session::get('VisitorId'))->get()->first();
            // return Session::get('VisitorId');
            $user->VisitorEmail=Auth::user()->email;
            $user->save();
            //check if the visitor is returning visitor
            $retvis=ReturningVisitors::where('VisitorId','=',Session::get('VisitorId'))->get();
            if($retvis){
                //then update the emails
                for($i=0;$i<count($retvis);$i++){
                    $retvis[$i]->VisitorEmail=Auth::user()->email;
                    $retvis[$i]->save();
                }
            }
        }
        //check if they have a cart item
        $cart=Cart::where([
            ['User','=',Session::get('Username')],
            ['Status','=','0']
        ])->get();
        // dd($cart);
        if(!is_null($cart)){
            for ($i=0; $i < count($cart); $i++) {
                $cart[$i]->User=Auth::user()->email;
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
                $wishlist[$i]->User=Auth::user()->email;
                $wishlist[$i]->save();
            }
        }
        $request->session()->forget('VisitorId');
        $request->session()->forget('Username');
        session(['Username'=>Auth::user()->email]);
        if(Session::has('intended')){
            //check ifthe person was to checkout
            if(Session::get('intended')=='checkout'){
                return redirect('/checkout');
            }
        }
        return view('home');
    }
}
