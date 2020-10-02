<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Label;
class LabelsController extends Controller {
    public function index () {
        $labels=Label::all();
        return $labels;
    }
    public function create () {
        return view('Labels.Create');
    }
    public function store (Request $request) {
      $label=Label::create([
        'Label'=>$request->Label,
        'Status'=>'0'
      ]);
      if($label){
        $data=['success'=>'label successfully Added'];
        return $data;
      }
    }
    public function show ($id) {
        //
    }
    public function edit ($id,$type) {
        $label=Label::findOrFail($id);
        if($type=='accept'){
            if($label){
                $label->Status=0;
                $label->save();
                $data=['status'=>'success'];
                return $data;
            }
        }else{
            if($label){
                $label->Status=1;
                $label->save();
                $data=['status'=>'success'];
                return $data;
            }
        }
    }
    public function update (Request $request, $id) {
        //
    }
    public function destroy ($id) {
        $label=Label::findOrFail($id);
        if($label){
            $label->delete();
            $data=['status'=>'success'];
            return $data;
        }
    }
}
