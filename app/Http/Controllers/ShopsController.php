<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Auth;
use App\Shop;
use Session;
class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Shop.Index');
    }

    protected function AllShops(){
        $shops=Shop::all();
        return $shops;
    }
    protected function Action($id,$type){
        $shop=Shop::where('ShopNumber','=',$id)->get()->first();
        if($type=='suspend'){
            $shop->ShopStatus=0;
        }else{
            $shop->ShopStatus=1;
        }
        $shop->save();
        return "true";
    }
    protected function getSpp(){
        $shop=Session::get('Shop');
        return $shop;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Shop.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'ShopName'=>'required|unique:shops',
            'Logo'=>'required',
            'Pin'=>'required',
            'Address'=>'required',
            'County'=>'required',
            'Town'=>'required',
            'ShopPhoneNumber'=>'required|unique:shops',
            'Acceptable'=>'required',
            'MpesaNumber'=>'required',
            'Bank'=>'required'
        ];
        $this->validate($request,$rules);
        $logo=$request->Logo;
        $newLogoName='ShopLogo'.$logo->getClientOriginalName();
        $logo->move('Logos',$newLogoName);
        $finalLogoName='Logos/'.$newLogoName;
        $pin=$request->Pin;
        $newPinName='ShopPin'.$pin->getClientOriginalName();
        $pin->move('Pins',$newPinName);
        $finalPinName='Pins/'.$newPinName;
        Shop::create([
            'ShopNumber'=>Str::random(10),
            'ShopName'=>$request->ShopName,
            'ShopLogo'=>$finalLogoName,
            'ShopPin'=>$finalPinName,
            'ShopAddress'=>$request->Address,
            'ShopCounty'=>$request->County,
            'ShopTown'=>$request->Town,
            'ShopPhoneNumber'=>$request->ShopPhoneNumber,
            'ShopAcceptable'=>$request->Acceptable,
            'ShopMpesa'=>$request->MpesaNumber,
            'ShopBankAccount'=>$request->ShopBankAccount,
            'ShopBank'=>$request->Bank,
            'ShopOwner'=>Auth::user()->email,
        ]);
        Session::flash('success','Your Store Has been created, We are verifying the Details and we will update you when verification is Complete');
       return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop=Shop::where('ShopNumber','=',$id)->get()->first();
        session(['Shop'=>$shop]);
        return view('Shop.Edit');
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
        $rules=[
            'ShopName'=>'required',
            'Address'=>'required',
            'County'=>'required',
            'Town'=>'required',
            'ShopPhoneNumber'=>'required',
            'Acceptable'=>'required',
            'MpesaNumber'=>'required',
            'Bank'=>'required'
        ];
        $this->validate($request,$rules);
        $shop=Shop::findOrFail($id);
        if($request->Logo){
            @unlink($shop->ShopLogo);
            $logo=$request->Logo;
            $newLogoName='ShopLogo'.$logo->getClientOriginalName();
            $logo->move('Logos',$newLogoName);
            $finalLogoName='Logos/'.$newLogoName;
            $shop->ShopLogo=$finalLogoName;
        }
        if($request->Pin){
            @unlink($shop->ShopPin);
            $pin=$request->Pin;
            $newPinName='ShopPin'.$pin->getClientOriginalName();
            $pin->move('Pins',$newPinName);
            $finalPinName='Pins/'.$newPinName;
            $shop->ShopPin=$finalPinName;
        }
        $shop->ShopName=$request->ShopName;
        $shop->ShopAddress=$request->Address;
        $shop->ShopCounty=$request->County;
        $shop->ShopTown=$request->Town;
        $shop->ShopPhoneNumber=$request->ShopPhoneNumber;
        $shop->ShopAcceptable=$request->Acceptable;
        $shop->ShopMpesa=$request->MpesaNumber;
        $shop->ShopBankAccount=$request->ShopBankAccount;
        $shop->ShopBank=$request->Bank;
        $shop->save();
        $request->session()->forget('Shop');
        return redirect()->route('shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
