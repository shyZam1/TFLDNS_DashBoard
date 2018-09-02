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
