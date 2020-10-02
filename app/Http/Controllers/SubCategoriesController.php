<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories=SubCategory::all();
        if($subCategories){
            $data=['Status'=>'success','Categories'=>$subCategories,'StatusCode'=>200];
            return $data;
        }
    }
    protected function GetCat($id){
        $category=Category::where('Category','=',$id)->get()->first();
        // return ;
        $subCategory=SubCategory::where('category_id','=',$category->id)->get();
        if($subCategory){
            return $subCategory;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SubCategories.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCategory=SubCategory::create([
            'category_id'=>$request->MainCategory,
            'SubCategory'=>$request->SubCategory,
            'Status'=>'0'
        ]);
        if($subCategory){
            $data=['Status'=>'success','message'=>'Sub Category Successfully Added','StatusCode'=>200];
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
        $subCategory=SubCategory::find($id);
        if($subCategory){
            $subCategory->Status=0;
            $subCategory->save();
            $data=['status'=>'success'];
            return $data;
        }
    }
    public function findSingle($id)
    {
        $subCategory=SubCategory::find($id);
        if($subCategory){
            $data=['subcategory'=>$subCategory];
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
        $subCategory=SubCategory::find($id);
        if($subCategory){
            $subCategory->Status=1;
            $subCategory->save();
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
        $subCategory=SubCategory::find($id);
        if($subCategory){
            $subCategory->delete();
            $data=['message'=>'category successfully Deleted'];
            return $data;
        }
    }
}
