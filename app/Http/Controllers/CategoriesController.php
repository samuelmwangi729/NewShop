<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        if($categories){
            $data=['Status'=>'success','Categories'=>$categories,'StatusCode'=>200];
            return $data;
        }
    }
    protected function getTop(){
        $categories=Category::all()->take(6);
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categories.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=Category::create([
            'Category'=>$request->Category,
            'Slug'=>strtolower($request->Category)
        ]);
        if($category){
            $data=['Status'=>'success','message'=>'Category Successfully Added','StatusCode'=>200];
            return $data;
        }else{
            $data=['Status'=>'error','message'=>'Category Not Added','StatusCode'=>422];
            return $data;
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
        $category=Category::findOrFail($id);
        if($category){
            $category->Status=0;
            $category->save();
            $data=['status'=>'success'];
            return $data;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        if($category){
            $category->Status=1;
            $category->save();
            $data=['status'=>'success'];
            return $data;
        }
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
        $category=Category::findOrFail($id);
        if($category){
            $category->delete();
            $data=['message'=>'category successfully Deleted'];
            return $data;
        }
    }
    public function getPCat($id){
        return $id;
    }
}
