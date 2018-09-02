@extends('theme.default')



@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">Dashboard</h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->

<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            List Of Domains
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table style="boarder:none">
                    <thead>
                        <tr >
                            <th style="text-align:center; font-size:20px;">Sub Domain</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($zonelist as $item)
                       
                        <tr>
                            <td > {!!$item!!}</td>
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

@endsection