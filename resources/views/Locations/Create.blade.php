@extends('layouts.user')
@section('content')
<div class="container-fluid">
    @foreach($errors->all() as $key)
    <div class="alert alert-danger">
        {{ $key }}
    </div>
    @endforeach
    <location-component></location-component>
</div>
@stop
