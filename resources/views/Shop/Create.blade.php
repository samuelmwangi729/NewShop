@extends('layouts.user')
@section('content')
<div class="container-fluid">
    @if($errors->all())
    <div class="alert alert-danger" style="color:red">
        @foreach($errors->all() as $key)
        {{ $key }}
        @endforeach
    </div>
    @endif
    <create-component></create-component>
</div>
@stop
