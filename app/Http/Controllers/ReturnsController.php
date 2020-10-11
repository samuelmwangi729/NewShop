<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Returns;
use Session;
class ReturnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $return=Returns::where('id','=',1)->get()->first();
        return view('Shop.Returns')->with('Returns',$return);
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

        $rule=[
            'Return'=>'required'
        ];
        $this->validate($request,$rule);
        //fetch all the returns in the dataase
        $return=Returns::where('id','=',1)->get()->first();
        if($return){
            //update the value
            $return->Return=$request->Return;
            $return->save();
            Session::flash('success','Return policy Updated');
            return redirect(route('returns.index'));
        }else{
            $return=Returns::create([
                'Return'=>$request->Return
            ]);
            if($return){
                Session::flash('success','Return policy Updated');
                return redirect(route('returns.index'));
            }
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
