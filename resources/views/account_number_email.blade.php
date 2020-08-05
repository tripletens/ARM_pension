@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <h1 class="text-center"> This is your Unique Account Number </h1>
            <h3> {{ $account_number }} - verification code : {{ $code }}</h3>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    
@endsection