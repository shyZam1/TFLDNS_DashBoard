<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>TFL DNS Dashboard</title>

        
    
    
</head>

<body>



    <div id="wrapper">



        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">

            @include('theme.header')

            @include('theme.sidebar')

        </nav>



        <div id="page-wrapper">

            @yield('content')
            @yield('scripts')

        </div>


    </div>

    

</body>



</html>