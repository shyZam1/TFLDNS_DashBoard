<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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

        </div>

        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->



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

    <script>
        // $(document).ready(function() {
        //     $('#dataTables-example').DataTable({
        //         responsive: true
        //     });
        // });


        $(document).ready(function() {
        var table = $('#dataTables-example').DataTable();
     
            $('#dataTables-example tbody').on('click', 'tr', function () {
                var data1 = table.row( this ).data();
                $('#search').val(data1);
                $('#pressMe').trigger('click');
                // $.post( "/query", function( data ) {
                //     alert( "Data Loaded: " + data );
                // });
                //alert( 'You clicked on '+data1[0]+'\'s row' );
            

            } );
        } );
        

        $('#confirmDelete').on('show.bs.modal', function (e) {
            $message = $(e.relatedTarget).attr('data-message');
            $(this).find('.modal-body p').text($message);
            $title = $(e.relatedTarget).attr('data-title');
            $(this).find('.modal-title').text($title);
       
            // Pass form reference to modal for submission on yes/ok
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #confirm').data('form', form);
    
            
        });
       
        // <!-- Form confirm (yes/ok) handler, submits form -->
    
        $('#confirm').find('.modal-footer #confirm').on('click', function(e){
                $(this).data('form').submit();
            });

    </script>


</body>



</html>