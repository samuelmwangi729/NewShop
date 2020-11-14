@extends('layouts.user')
@section('content')
<div class="container">
    <h2 class="text-center">
        Set Sellers Fee
    </h2>
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <form action="{{ route('sellers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="number" name="Amount" class="form-control @error('Amount') is-invalid @enderror" placeholder="Enter the Amount Here">
                    @error('Amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-success btn-md">
                    Set Fee
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <h2 class="text-center">
            Active Sellers
        </h2>
    </div>
</div>
@endsection
