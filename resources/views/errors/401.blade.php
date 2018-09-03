@extends('theme.default')


@section('content')
    <div class="error-page">
        <h2 class="headline text-info"> 401</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
            <p>
                Unauthorized Access!!!
                Meanwhile, you may <a href="{{ url('/') }}">return to dashboard</a>
            </p>
        </div>
    </div>
@endsection