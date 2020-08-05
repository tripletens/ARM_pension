@extends('welcome')
@section('content')
        <div class="col-md-2">

            </div>
            <div class="jumbotron col-md-8">
                <h1 class="text-center">Welcome to ABC Company</h1>
                <!-- <p>...</p> -->
                <p style="text-align:center;">
                    <br><br>
                    <a class="btn btn-primary btn-lg" href="{{ route('register')}}" role="button">Register</a>
                </p>
            </div>
            <div class="col-md-2">
            
            </div>
@endsection