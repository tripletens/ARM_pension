@if (count($errors) > 0 )
    @foreach ( $errors->all() as $error)
        <div class="alert alert-danger btn btn-red white-text">
            {{ $error }}
        </div>
    @endforeach
@endif
@if ( session('success') )
    <div class="alert alert-success  btn btn-green white-text">
        {{ session('success') }}
    </div>
@endif
@if ( session('error') )
    <div class="alert alert-danger btn btn-red white-text">
        {{ session('error') }}
    </div>
@endif
