@extends('theme.default')



@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">Dashboard</h1>

    </div>

    <!-- /.col-lg-12 -->

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    List Of Domains
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div>
                    {{-- <p> This page was opened at {{$time}}</p>
                    <p> Yesterday's date: {{$yes}}</p>
                    <p> Date one week ago from today was: {{$lastWeek}}</p> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id ="dataTables-example">
                            <thead>
                                <tr>
                                    <th style="text-align:center; font-size:20px;">Sub Domain</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($list as $item)
                               
                                <tr>
                                    <td style="text-align:center; font-size:17px;"> {{$item}}</td>
                                    
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            Zone Details
                        </div>
                        <form action="/query" method="POST" role="search">
                        </br>
                            {{ csrf_field() }}
                            <div style="width:50%;margin-left:auto;margin-right:auto;visibility:hidden;position:absolute;"class="input-group">
                                <input style="width:100%;" type="text" class="form-control" name="x" id="search"
                                    placeholder="Domain"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default" id="pressMe">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table style="boarder:none">
                                        <thead>
                                            <tr >
                                                <th style="text-align:center; font-size:20px;">Zone Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($zonelist as $list)
                                        
                                            <tr>
                                                <td > {!!$list!!}</td>
                                                {{-- <td > {{$output}}</td> --}}
                                                
                                            </tr>
                                            
                                            @endforeach
                                        </tbody>
                                    </table>
                       
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->

        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->

</div>



@endsection

@section('scripts')
{{-- <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script> --}}
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

         
            
            
        

        // $('#confirmDelete').on('show.bs.modal', function (e) {
        //     $message = $(e.relatedTarget).attr('data-message');
        //     $(this).find('.modal-body p').text($message);
        //     $title = $(e.relatedTarget).attr('data-title');
        //     $(this).find('.modal-title').text($title);
       
        //     // Pass form reference to modal for submission on yes/ok
        //     var form = $(e.relatedTarget).closest('form');
        //     $(this).find('.modal-footer #confirm').data('form', form);
    
            
        // });
       
        // // <!-- Form confirm (yes/ok) handler, submits form -->
    
        // $('#confirm').find('.modal-footer #confirm').on('click', function(e){
        //         $(this).data('form').submit();
        //     });

    </script>
@endsection