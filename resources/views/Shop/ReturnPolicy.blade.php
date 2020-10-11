@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <head-component></head-component>
    <div class="container">
        <h1 class="text-center" style="text-decoration:underline">
            Returns and Policy
        </h1>
       <div class="mt-3 row">
        <span class="Text-center">
            {!! $Returns[0]->Return !!}
        </span>
       </div>
    </div>
</div>
@stop
