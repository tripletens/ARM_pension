@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <h1 class="text-center"> Register Here </h1>
            @if (session('success') )
                <div class="alert alert-success  btn btn-green white-text">
                    {{ session('success') }}
                </div>
            @endif
            @if ( session('error') )
                <div class="alert alert-danger btn btn-red white-text">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('store-user')}}">
                @csrf
                <div class="form-group">
                    <label for="Firstname">Surname : </label>
                    <input type="text" placeholder="Enter Surname here" name="surname" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="Firstname">First Name : </label>
                    <input type="text" placeholder="Enter Firstname here" name="firstname" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="Lastname">Address : </label>
                    <textarea class="form-control" name="address" Placeholder="Enter Address here"></textarea>
                </div>
                <div class="form-group">
                    <label for="email">Email Address : </label>
                    <input type="email" required placeholder="Enter Email Address here" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="phone">Mobile Number: </label>
                    <input type="number" required placeholder="Enter Phone Number here" name="phone" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="phone">Date of Birth: </label>
                    <input type="date" required placeholder="Enter Date of birth here" name="dob" class="form-control"/>
                </div>
                <button class="btn btn-success">Register</button><br><br>
            </form>
        </div>
        <div class="col-md-2">
        </div>
    </div>
@endsection