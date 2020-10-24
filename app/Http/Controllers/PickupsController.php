<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pickup;
use Session;
class PickupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Shop.Pickup');
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
    protected function getAll(){
        $stations=Pickup::all();
        return $stations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'TownId'=>'required',
            'StationName'=>'required',
            'Shipping'=>'required'
        ]);
        $station=Pickup::create([
            'TownId'=>$request->TownId,
            'StationName'=>$request->StationName,
            'Shipping'=>$request->Shipping
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $stations=PickUp::where([
           ['TownId','=',$id],
           ['Status','=','0']
       ])->get();
       return $stations;
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
    protected function getCost($station){
        session(['Station'=>$station]);
        // return Session::get('Station');
        //for easier referencing later
        return Pickup::where('StationName','=',$station)->get()->first()->Shipping;
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
        $station=Pickup::where('StationName','=',$id)->get()->first();
        if($station){
            $station->delete();
            return "true";
        }
    }
}
