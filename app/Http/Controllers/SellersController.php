<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use Session;
class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Sellers.Index');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['Amount'=>'required'];
        $this->validate($request,$rules);
        $seller=Seller::where('id','=',1)->get()->first();
        // return $seller;
        if(is_null($seller)){
            Seller::create([
                'Amount'=>$request->Amount,
                'Status'=>'0'
            ]);
            Session::flash('success','The Sellers amount has been created');
            return back();
        }else{
            $seller->Amount=$request->Amount;
            $seller->Status=0;
            $seller->save();
            Session::flash('success','The Sellers amount has been updated');
            return back();

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
        //
    }
}
