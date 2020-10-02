@extends('layouts.user');
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5">
            <img src="{{ asset($product->ProductBanner) }}" alt="" width="100%">
            <div class="row mt-3">
                <div class="col-sm-4">
                    <img src="{{ asset($product->FrontImage) }}" alt="" width="70px" height="70px" style="border-radius:50px">
                    Front Image
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset($product->SideImage) }}" alt="" width="70px" height="70px" style="border-radius:50px">
                    Side View
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset($product->BackImage) }}" alt="" width="70px" height="70px" style="border-radius:50px">
                    Back View
                </div>
            {{--  {{ $product }}  --}}
            </div>
        </div>
        <div class="col-sm-7 text-center">
            <h1 class="text-center">
                {{ $product->ProductName }}
            </h1>
           <h4> Brand: {{ $product->ProductBrand }}</h4>
           <h4> Category: {{ $product->ProductCategory }}</h4>
           <h4> SubCategory: {{ $product->ProductSubCategory }}</h4>
           <h4>Price: Ksh {{ $product->Price }}</h4>
           <h4> Discount:  {{ $product->Discount }} % </h4>
            <h4> Final Price:  Ksh {{ $product->FinalPrice }} </h4>
            <h4>Posted by {{ $product->AddedBy }}</h4>
            <h4>Views {{ $product->Views }}</h4>
            <h4>Store Keeping Unit {{ $product->SKU }}</h4>
            <h4>Available in Store {{ $product->Qty }} items</h4>
        </div>
       {!! $product->Description !!}
    </div>
</div>
@stop
