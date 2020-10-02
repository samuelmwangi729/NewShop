@extends('layouts.user')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-4 offset-sm-4 card">
        @if($errors->all())
        <div class="alert alert-danger" style="color:red">
            @foreach($errors->all() as $error)
            <span>{{ $error }}</span><br>
            @endforeach
        </div>
        @endif
        <h1 class="text-center">Edit Brand</h1>
        <form  method="post" action="{{ route('brand.update',[$brand->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="Categories" class="label-control">
                    <i class="fa fa-tags"></i>
                    Categories
                </label>
                <select name="Category" id="" class="form-control">
                    <option label="--Select Category--"></option>
                    @foreach($categories as $category => $value)
                    <option @if($value->id == $brand->Category) selected @endif>{{ $value->Category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="BrandName" class="label-control">
                    <i class="fa fa-tag"></i>
                    Brand Name
                </label>
                <input type="text" name="BrandName" class="form-control" required value="{{ $brand->BrandName }}">
            </div>
            <div class="form-group">
                <label for="BrandImage" class="label-control">
                    <i class="fa fa-image"></i>
                    Brand Image
                </label>
                <input type="file" name="BrandImage" class="form-control">
            </div>
            <button class="btn btn-success btn-block mb-3" type="submit">
                Update Brand
            </button>
        </form>
    </div>
</div>
</div>
@endsection
