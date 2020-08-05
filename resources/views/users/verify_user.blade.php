@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <h1 class="text-center"> Get Verified Here </h1>
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
            <form action="{{route('process-verify-user')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Firstname">Email Address : </label>
                    <input type="text" placeholder="Enter Email Address here " name="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="Firstname">Enter 4 digit Code : </label>
                    <input type="text" placeholder="Enter 4 digit code here " name="code" class="form-control" />
                </div>
                <button class="btn btn-success">Verify Code </button>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h1> Save Employer Details  </h1>
            <form action="{{ route('process-add-employer') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Firstname">User Email Address : </label>
                    <input type="text" placeholder="Enter User Email Address here " name="user_email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="Firstname">Employer Name : </label>
                    <input type="text" placeholder="Enter Employer Name here " name="employer_name" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="Firstname">Employer Email : </label>
                    <input type="email" placeholder="Enter Employer Email here " name="employer_email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="Firstname">Employer address : </label>
                   <textarea class="form-control" placeholder="Enter Employer Address" name="employer_address"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Add Employer Details </button>
            </form>
        </div>
        <div class="col-md-6">
        <h1> Save Next of Kin  Details  </h1>
            <form action="{{ route('process-add-nok') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Firstname">User Email Address : </label>
                    <input type="text" placeholder="Enter User Email Address here " name="user_email" class="form-control" />
                </div>
               
                <div class="form-group">
                    <label for="Firstname">Next of Kin Surname : </label>
                    <input type="text" placeholder="Enter Next of Kin Surname here " name="NOK_surname" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="Firstname">Next of Kin Firstname : </label>
                    <input type="text" placeholder="Enter Next of Kin Firstname here " name="NOK_firstname" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="NOK_mobile_number">Next of Kin Mobile Number: </label>
                    <input type="number" placeholder="Enter Next of Kin Mobile Number here " name="NOK_mobile_number" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="Firstname">Next of Kin Email : </label>
                    <input type="email" placeholder="Enter Next of Kin Email here " name="NOK_email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="Firstname">Next of Kin address : </label>
                   <textarea class="form-control" placeholder="Enter Next of Kin Address" name="NOK_address"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Add Next of Kin Details </button>
            </form>
        </div>
    </div>
    
@endsection