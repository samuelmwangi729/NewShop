@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <head-component></head-component>
    <div class="container">
        <h1 class="text-center" style="text-decoration:underline">
            Terms and Conditions
        </h1>
       <div class="row mt-3">
        <span class="Text-center">
            {!! $Terms[0]->Terms !!}
        </span>
       </div>
    </div>
</div>
@stop
