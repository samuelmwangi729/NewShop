<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Country,Town};
class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        $counties=Country::all();
        return $counties;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Locations.Create');
    }
    public function Towns(){
        return view('Locations.Towns');
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
            'County'=>'required|unique:countries'
        ]);
        Country::create([
            'County'=>$request->County
        ]);
        return "true";
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

    public function getTown($county){
        $towns=Town::where('County','=',$county)->get();
        return $towns;
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
        $loc=Country::findOrFail($id);
        if($loc){
            $loc->delete();
            return "true";
        }
    }
    public function delete($id){
        $town=Town::findOrFail($id);
        if($town){
            $town->delete();
            return "true";
        }
    }
    protected function AddTowm(Request $request){
        $town=Town::create([
            'County'=>$request->County,
            'Town'=>$request->Town
        ]);
        if($town){
            $data=['message'=>'Town Successfully Created','Status'=>'Success','StatusCode'=>'200'];
            return $data;
        }
    }
    protected function getTowns(){
        $towns=Town::all();
        return $towns;
    }
    protected function Action($id,$type){
        $loc=Country::findOrFail($id);
        if($type=='suspend'){
            $loc->Status=1;
        }else{
            $loc->Status=0;
        }
        $loc->save();
        return "success";
    }
    protected function getCountyTown($county){
        $towns=Town::where('County','=',$county)->get();
        return$towns;
    }
}
