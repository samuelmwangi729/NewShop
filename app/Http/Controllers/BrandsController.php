<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Brand,Category};
class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return $brands;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Brands.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand=Brand::create([
            'Category'=>$request->Category,
            'BrandName'=>$request->BrandName,
            'BrandImage'=>'NULL',
        ]);
        if($brand){
            $data=['Status'=>'success','message'=>'Brand Successfully Added','StatusCode'=>200];
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
        $brand=Brand::findOrFail($id);
        return view('Brands.Edit')
        ->with('categories',Category::all())
        ->with('brand',$brand);
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
        $brand=Brand::findOrFail($id);
        if($request->BrandName){
            $brand->BrandName=$request->BrandName;
        }
        if($request->Category){
            $brand->Category=$request->Category;
        }
        $rule=[
            'BrandImage'=>'required|mimes:png,jpg,jpeg'
        ];
        $this->validate($request,$rule);
        $file=$request->BrandImage;
        $newName=time().$file->getClientOriginalName();
        $file->move('brands/images',$newName);
        $brand->BrandImage='/brands/images/'.$newName;
        $brand->save();
        return redirect('/brand/create');
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
