@extends('layouts.user')
@section('content')
<div class="container-fluid">
    @if($errors->all())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        @foreach($errors->all() as $errors)
            <span style="color:red">
                {{ $errors }}<br>
            </span>
        @endforeach
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <product-component></product-component>
</div>
@endsection
