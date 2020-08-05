<!DOCTYPE html>
<html>
    <head>
        <title>ABC Company</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home-page')}}">ABC Company</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">Home</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="{{ route('verify-user')}}"><span class="glyphicon glyphicon-saved"></span> Verify Account</a></li>
            </ul>
            </div>
        </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
            
            
        </div>
    </body>
</html>