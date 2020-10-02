@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col sm-5 card mt-2 mb-2 ml-2">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
           <form action="{{ route('collection.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
               <h1 class="text-center">Add Collection</h1>
               <div class="form-group">
                   <label class="label-control">
                       <i class="fa fa-tag"></i>
                       Title
                   </label>
                   <input type="text" name="Title"  class="form-control @error('Title') is-invalid @enderror">
                   @error('Title')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror
               </div>
               <div class="form-group">
                <label class="label-control">
                    <i class="fa fa-tag"></i>
                    Introduction Text
                </label>
                <input type="text" name="Text"  class="form-control @error('Text') is-invalid @enderror">
                    @error('Text')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="label-control">
                    <i class="fa fa-tag"></i>
                    Collection Banner
                </label>
                <input type="file" name="Banner"  class="form-control @error('Banner') is-invalid @enderror">
                @error('Banner')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button class="btn btn-success" type="submit">Add Collection</button>
           </form>
        </div>
        <div class="col-sm-7">
            <collection-component></collection-component>
        </div>
    </div>
</div>
@endsection
