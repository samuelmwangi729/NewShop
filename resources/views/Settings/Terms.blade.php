@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card text-center">
                <h1>
                    Terms and Conditions
                </h1>
            </div>
            <form action="{{ route('terms.store') }}" method="post">
                @csrf
                @error('Term')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <textarea name="Term" id="demo-summernote" style="width:100%">
                   {!! $Terms->Terms ?? '' !!}
                </textarea>
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <button class="btn btn-success mt-4">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4">
            <div class="card text-center">
                <h1>
                    Actions
                </h1>
            </div>
            <button class="btn btn-success">
                View Terms
            </button>
        </div>
    </div>
@stop
