<?php

namespace App\Http\Controllers;
use Str;
use Illuminate\Http\Request;
use App\{Product,Cart,Wishlist,Order};
use Auth;
use Session;
class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Shop.Cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getAllUserData(Request $request){
        $orderId="#".$request->orderid;
        $userData=[];
        $order= Order::where('OrderNumber','=',$orderId)->get()->first();
        return $order;
    }
    public function getOrderProducts(Request $request){
        $orderId="#".$request->Order;
        $cart=Cart::where([
            ['OrderNumber','=',$orderId],
            ['Status','=','5'],
        ])->get();
        // return $cart[0]->ProductSKU;
        $products=[];
        for($i=0;$i<count($cart);$i++){
            //get the product and add it to an array
            $product=Product::where('SKU','=',$cart[$i]->ProductSKU)->get();
            array_push($products,[$product,$cart[$i]->Qty]);
        }
        return $products;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return Session::get('Username');
        $username=Session::get('Username');
        $product=Product::where('SKU','=',$request->SKU)->get()->first();
        if(is_null($product)){
            return back();
        }
        // return $product;
        $prod=Cart::where([
            ['ProductSKU','=',$request->SKU],
            ['User','=',$username],
            ['Status','=',0]
        ])->get()->first();
        $quantity=$request->Qty;
        // return $prod;
        if(is_null($prod)){
            //adding the items to cart
            Cart::create([
                'ProductSKU'=>$request->SKU,
                'Qty'=>$quantity,
                'OrderNumber'=>'Null',
                'User'=>$username,
            ]);
            return ['success'=>'Product Successfully Added to Cart'];
        }else{
            return ['error'=>'Product already in Cart'];
        }
    }
    public function AddWishlist(Request $request){
        //post the product into the wishlist
        $username=Session::get('Username');
        $product=Product::where('SKU','=',$request->SKU)->get()->first();
        if(is_null($product)){
            return back();
        }
        //if the product does not exist, return back
        $prod=Wishlist::where([
            ['ProductSKU','=',$request->SKU],
            ['User','=',$username]
        ])->get()->first();
        if(is_null($prod)){
            Wishlist::create([
                'ProductSKU'=>$request->SKU,
                'User'=>$username,
            ]);
            return ['success'=>'Product Successfully Added to Wislist'];
        }else{
            return ['error'=>'Product already in Your Wishlist'];
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart=Cart::where('ProductSKU','=',$id)->get()->first();
        $Qty=$cart->Qty+1;
        $cart->Qty=$Qty;
        $cart->save();
        return $Qty;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=Cart::where([
            ['ProductSKU','=',$id],
            ['User','=',Session::get('Username')]
            ])->get()->last();
        if($cart){
            $cart->Status=2;
            $cart->save();
            return "true";
        }
    }
    protected function setUsername(){
        if(Session::has('Username')){
            return Session::get('Username');
        }else{
            if(Auth::check()){
                session(['Username'=>Auth::user()->email]);
            }else{
                session(['Username'=>Str::random(30)]);
            }
        }
        return Session::get('Username');
    }
    protected function getCart(){
        $username=Session::get('Username');
        $products=[];
        $cart=Cart::where([
            ['User','=',$username],
            ['Status','=','0']
        ])->get();
        for($i=0;$i<count($cart);$i++){
            //get the product and add it to an array
            $product=Product::where('SKU','=',$cart[$i]->ProductSKU)->get();
            array_push($products,[$product,$cart[$i]->Qty]);
        }
        return $products;
    }
    protected function getCartOrder(){
        $username=Session::get('Username');
        // return Session::get('Number');
        $products=[];
        $cart=Cart::where([
            ['User','=',$username],
            ['Status','=','5'],
            ['OrderNumber','=',Session::get('OrderNumber')]
        ])->get();
        // return Cart::all();
        for($i=0;$i<count($cart);$i++){
            //get the product and add it to an array
            $product=Product::where('SKU','=',$cart[$i]->ProductSKU)->get();
            array_push($products,[$product,$cart[$i]->Qty]);
        }
        return $products;
    }
    protected function getWishlist(){
        $username=Session::get('Username');
        $products=[];
        $cart=WIshlist::where([
            ['User','=',$username],
            ['Status','=','0']
        ])->get();
        for($i=0;$i<count($cart);$i++){
            //get the product and add it to an array
            $product=Product::where('SKU','=',$cart[$i]->ProductSKU)->get();
            array_push($products,[$product,$cart[$i]->Qty]);
        }
        return $products;
    }
    protected function getWish(){
        //if the user is not logged ig
        if(Auth::check()){
            //if is logged in
            $username=Auth::user()->email;
        }else{
            $username=Session::get('Username');
        }

        $wish=Wishlist::where([
            ['User','=',$username],
            ['Status','=','0']
        ])->get();
        return count($wish);
    }
    protected function getCartTotal(){
        $username=Session::get('Username');
        $products=[];
        $cart=Cart::where([
            ['User','=',$username],
            // ['OrderNumber','=','#'.Session::get('OrderNumber')],
            ['Status','=','0']
        ])->get();
        for($i=0;$i<count($cart);$i++){
            //get the product and add it to an array
            $product=Product::where('SKU','=',$cart[$i]->ProductSKU)->get();
            array_push($products,$product);
        }
        $sum=0;
        for($i=0;$i<count($products);$i++){
            $sum=$products[$i][0]->FinalPrice+$sum;
        }
        return $sum;
    }
    protected function getCartTotal1(){
        $username=Session::get('Username');
        $products=[];
        $cart=Cart::where([
            ['User','=',$username],
            ['OrderNumber','=',Session::get('OrderNumber')],
            ['Status','=','5']
        ])->get();
        // return $username;
        for($i=0;$i<count($cart);$i++){
            //get the product and add it to an array
            $product=Product::where('SKU','=',$cart[$i]->ProductSKU)->get();
            array_push($products,$product);
        }
        $sum=0;
        for($i=0;$i<count($products);$i++){
            $sum=$products[$i][0]->FinalPrice+$sum;
        }
        return $sum;
    }
    protected function countCart(){
        $username=Session::get('Username');
        // return $username;
        $cart=Cart::where([
            ['User','=',$username],
            ['Status','=',0]
            // ['OrderNumber','=','#'.Session::get('OrderNumber')]
        ])->get();
        return count($cart);
    }
    protected function countCart1(){
        $username=Session::get('Username');
        // return $username;
        $cart=Cart::where([
            ['User','=',$username],
            ['Status','=',5],
            ['OrderNumber','=',Session::get('OrderNumber')]
        ])->get();
        return count($cart);
    }
    protected function getUserCount($id){
        $username=Session::get('Username');
        $cart=Cart::where([
            ['ProductSKU','=',$id],
            ['User','=',$username],
            ['Status','=','0']
        ])->get()->first();
        return $cart->Qty;
    }
    protected function CheckOut(Request $request){
        if(Session::has('intended')){
            $request->session()->forget('intended');
        }
        return view('Shop.CheckOut');
    }

}
