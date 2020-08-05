@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <h1 class="text-center"> This is the User's details </h1>
             <!-- `surname`, `firstname`, `email`, `address`, `phone`, `dob`, `code`, `account_number`, -->
            <h3> Surname : {{ $user['surname'] }}</h3>
            <h3> Firstname : {{ $user['firstname'] }}</h3>
            <h3> Email : {{ $user['email'] }}</h3>
            <h3> Address : {{ $user['address'] }}</h3>
            <h3> Phone : {{ $user['phone'] }}</h3>
            <h3> Date of Birth : {{ $user['dob'] }}</h3>
            <h3> User Account Number : {{ $user['account_number'] }}</h3>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    
@endsection