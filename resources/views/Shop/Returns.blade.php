@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
               <h1 class="text-center">
                Return Policy
               </h1>
            </div>
            <form action="{{ route('returns.store') }}" method="post">
                @csrf
                @error('Term')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <textarea name="Return" id="demo-summernote" style="width:100%">
                   {!! $Returns->Return ?? '' !!}
                </textarea>
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <button class="mt-4 btn btn-success">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
