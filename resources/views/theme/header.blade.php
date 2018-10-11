<div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

    </button>
    <div>
        <a href="{{ url('/') }}">
            <img src="{{URL::to('/images/telecom-fiji-limited-logo.png')}}" alt="TFL Logo" style="width:70px; height:50px;"></img> 
        </a>
    </div>
   
</div>

<!-- /.navbar-header -->



<ul class="nav navbar-top-links navbar-right">

    

    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @else

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest

    <!-- /.dropdown -->

</ul>

  <!-- Bootstrap Core CSS -->

  <link href="{!! asset('theme/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

  <!-- MetisMenu CSS -->

  <link href="{!! asset('theme/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">

  <!-- Custom CSS -->

  <link href="{!! asset('theme/dist/css/sb-admin-2.css') !!}" rel="stylesheet">

  <!-- Morris Charts CSS -->

  <link href="{!! asset('theme/vendor/morrisjs/morris.css') !!}" rel="stylesheet">

  <!-- Custom Fonts -->

  <link href="{!! asset('theme/vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

  <!-- DataTables CSS -->
  <link href="{!! asset('theme/vendor/datatables-plugins/dataTables.bootstrap.css')!!}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{!! asset('theme/vendor/datatables-responsive/dataTables.responsive.css')!!}" rel="stylesheet">
    {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="http://code.highcharts.com/stock/highstock.js"></script> 
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>     
   


      <!-- jQuery -->
      <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
  
      <!-- Metis Menu Plugin JavaScript -->
      <script src="{!! asset('theme/vendor/metisMenu/metisMenu.min.js') !!}"></script>
  
      <!-- DataTables JavaScript -->
      <script src="{!! asset('theme/vendor/datatables/js/jquery.dataTables.min.js')!!}"></script>
  
      <script src="{!! asset('theme/vendor/datatables-plugins/dataTables.bootstrap.min.js')!!}"></script>
  
      <script src="{!! asset('theme/vendor/datatables-responsive/dataTables.responsive.js')!!}"></script>
  
      <!-- Morris Charts JavaScript -->
      <script src="{!! asset('theme/vendor/raphael/raphael.min.js') !!}"></script>
  
      <script src="{!! asset('theme/vendor/morrisjs/morris.min.js') !!}"></script>
  
      <script src="{!! asset('theme/data/morris-data.js') !!}"></script>
  
      <!-- Custom Theme JavaScript -->
      <script src="{!! asset('theme/dist/js/sb-admin-2.js') !!}"></script>
  

<!-- /.navbar-top-links -->