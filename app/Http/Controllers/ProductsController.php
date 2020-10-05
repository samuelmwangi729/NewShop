<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Product;
use Str;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Products.Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Products.Create');
    }
    public function SingleCategory($name){
        $products=Product::where([
            ['ProductCategory','=',$name],
            ['Status','=',1]
        ])->get();
        if(count($products)>0){
            $data=['Status'=>'Ok','products'=>$products,'message'=>'0'];
        }else{
            $data=['Status'=>'Ok','products'=>$products,'message'=>'1'];
        }
        return $data;
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
            'ProductName'=>'required|unique:products',
            'Brand'=>'required',
            'Category'=>'required',
            'SubCategory'=>'required',
            'Banner'=>'required|mimes:png,jpeg,jpg',
            'Front'=>'required|mimes:png,jpeg,jpg',
            'Side'=>'required|mimes:png,jpeg,jpg',
            'Back'=>'required|mimes:png,jpeg,jpg',
            'Price'=>'required',
            'Discount'=>'required',
            'SKU'=>'required',
            'Qty'=>'required',
            'Description'=>'required',
        ];
        $this->validate($request,$rules);
        // dd($request->all());
        $banner=$request->Banner;
        $newBannerName='Banner'.$banner->getClientOriginalName();
        $banner->move('products/Images',$newBannerName);
        $newFinalBannerName='/products/Images/'.$newBannerName;
        //end upload banner
        $front=$request->Front;
        $newFrontName='Front'.$front->getClientOriginalName();
        $front->move('products/Images',$newFrontName);
        $newFinalFrontName='/products/Images/'.$newFrontName;
        //end upload front image'
        $side=$request->Side;
        $newSideName='Side'.$side->getClientOriginalName();
        $side->move('products/Images',$newSideName);
        $newFinalSideName='/products/Images/'.$newSideName;
        //end upload side image
        $back=$request->Back;
        $newBackName='Back'.$side->getClientOriginalName();
        $back->move('products/Images',$newBackName);
        $newFinalBackName='/products/Images/'.$newBackName;
        $discount=($request->Price*$request->Discount)/100;
        //end upload Back image
        Product::create([
        'ProductName'=>$request->ProductName,
        'ProductBrand'=>$request->Brand,
        'Slug'=>str_slug($request->ProductName, '-'),
        'ProductCategory'=>$request->Category,
        'ProductSubCategory'=>$request->SubCategory,
        'ProductBanner'=>$newFinalBannerName,
        'FrontImage'=>$newFinalFrontName,
        'SideImage'=>$newFinalSideName,
        'BackImage'=>$newFinalBackName,
        'Price'=>$request->Price,
        'Discount'=>$request->Discount,
        'FinalPrice'=> $request->Price - $discount,
        'SKU'=>$request->SKU,
        'Qty'=>$request->Qty,
        'Description'=>$request->Description,
        'Out'=>1,
        'Collection'=>'NULL',
        'Tags'=>'NULL',
        'Shop'=>'NULL',
        'AddedBy'=>Auth::user()->email,
        ]);
        Session::flash('success','Product Successfully Added');
        return back();
    }

    protected function getSpecific($id){
        $products=Product::where([
            ['ProductCategory','=',$id],
            ['Status','=',1]
        ])->get();
        return $products;
    }
    protected function loadSingle(){
        $prods=Product::orderBy('id','asc')->where('Status','=','1')->get()->take(6);
        return $prods;
    }
    protected function getAll(){
        $products=Product::all();
        return $products;
    }
    protected function getHot(){
        $products=Product::orderBy('id','desc')->get()->take(3);
        return $products;
    }
    protected function gettBest(){
        $products=Product::orderBy('id','asc')->get()->take(3);
        return $products;
    }
    protected function getTop(){
        $products=Product::orderBy('Views','desc')->get()->take(3);
        return $products;
    }
    protected function LoadAll(){
        $products=Product::all();
        return $products;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::where([
            ['Slug','=',$id],
            ['Status','=',1],
        ])->get()->first();
        return view('Products.Show')->with('product',$product);
    }
    protected function Act($id,$type){
        $product=Product::where('Slug','=',$id)->get()->first();
        if($type=='Approve'){
            $product->Status=1;
            $product->save();
        }
        if($type=='Suspend'){
            $product->Status=2;
            $product->save();
        }
        return "success";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::where('Slug','=',$id)->get()->first();
        session(['Product'=>$product]);
        return view('Products.Edit')->with('product',$product);
    }
    public function PEdit(){
        $product=Session::get('Product');
        return $product;
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
        $product=Product::where('Slug','=',$id)->get()->first();
        $rules=[
            'ProductName'=>'required',
            'Brand'=>'required',
            'Category'=>'required',
            'SubCategory'=>'required',
            'Price'=>'required',
            'Discount'=>'required',
            'SKU'=>'required',
            'Qty'=>'required',
            'Description'=>'required',
        ];
        $this->validate($request,$rules);
        // dd($request->all());
        if($request->Banner){
            @unlink($product->ProductBanner);
            $banner=$request->Banner;
            $newBannerName='Banner'.$banner->getClientOriginalName();
            $banner->move('products/Images',$newBannerName);
            $newFinalBannerName='/products/Images/'.$newBannerName;
            $product->ProductBanner=$newFinalBannerName;
            //end upload banner
        }
        if($request->Front){
            @unlink($product->FrontImage);
            $front=$request->Front;
            $newFrontName='Front'.$front->getClientOriginalName();
            $front->move('products/Images',$newFrontName);
            $newFinalFrontName='/products/Images/'.$newFrontName;
            $product->FrontImage=$newFinalFrontName;
        //end upload front image'
        }
        if($request->Side){
            @unlink($product->SideImage);
            $side=$request->Side;
            $newSideName='Side'.$side->getClientOriginalName();
            $side->move('products/Images',$newSideName);
            $newFinalSideName='/products/Images/'.$newSideName;
            //end upload side image
            $product->SideImage=$newFinalSideName;
        }
        if($request->Back){
            @unlink($product->BackImage);
            $back=$request->Back;
            $newBackName='Back'.$side->getClientOriginalName();
            $back->move('products/Images',$newBackName);
            $newFinalBackName='/products/Images/'.$newBackName;
            $product->BackImage=$newFinalBackName;
            //end upload Back image
        }
        $discount=($request->Price*$request->Discount)/100;
         $product->ProductName=$request->ProductName;
        $product->ProductBrand=$request->Brand;
        $product->Slug=str_slug($request->ProductName,'-');
        $product->ProductCategory=$request->Category;
        $product->ProductSubCategory=$request->SubCategory;
        $product->Price=$request->Price;
        $product->Discount=$request->Discount;
        $product->FinalPrice= $request->Price - $discount;
        $product->SKU=$request->SKU;
        $product->Qty=$request->Qty;
        $product->Description=$request->Description;
        $product->Out=1;
        $product->Collection='NULL';
        $product->Tags='NULL';
        $productShop='NULL';
        $product->AddedBy=Auth::user()->email;
        $product->save();
        return redirect('/product');
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
    protected function getOne($slug){
        $product=Product::where('Slug','=',$slug)->get()->first();
        session(['Product'=>$product]);
        return view('Products.Single');
    }
    protected function getSessions(){
        $product=Session::get('Product');
        return $product;
    }
    static function getName($slug){
        $product=Product::where('SKU','=',$slug)->get()->first();
        return $product->ProductName;
    }
}
