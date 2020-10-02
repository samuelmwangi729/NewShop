<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use Session;
class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections=Collection::all();
        return $collections;
    }
    protected function getFeatured(){
        $collections=Collection::where('Status','=','2')->get()->take(2);
        return $collections;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Collections.Create');
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
            'Title'=>'required|unique:collections',
            'Text'=>'required',
            'Banner'=>'required|mimes:png,jpeg,jpg'
        ];
        $this->validate($request,$rules);
        $file=$request->Banner;
        $Name=time().$file->getClientOriginalName();
        $file->move('collections/images',$Name);
        $newName='collections/images/'.$Name;
        $collection=Collection::create([
            'Title'=>$request->Title,
            'Description'=>$request->Text,
            'Image'=>$newName,
        ]);
        Session::flash('success','Collection Successfully Added');
        return back();
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
    public function edit($id,$type)
    {
        $collection=Collection::findOrFail($id);
        if($type=='activate'){
            $collection->Status=0;
            $collection->save();
        }elseif($type=='feature'){
            $collection->Status=2;
            $collection->save();
        }else{
            $collection->Status=1;
            $collection->save();
        }

        return $collection;
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
        $collection=Collection::findOrFail($id);
        if($collection){
            $collection->delete($id);
            return "true";
        }
    }
}
