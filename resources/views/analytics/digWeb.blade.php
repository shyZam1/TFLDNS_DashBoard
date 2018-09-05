@extends('theme.default')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">Dig Web Interface</h1>

    </div>

    <!-- /.col-lg-12 -->
    
</div>

<div class="row">
        <div class=" panel panel-primary">
            <div class="panel-heading">Dig Console</div>

            <div class="panel-body">
                <div class="col-lg-6">
                   
                    {!! Form::open(['url' => '/digWeb','method'=>'GET']) !!}
                    <div class="row">
                        <div>
                            <div class="form-group">
                                <strong>Record Type:</strong>
                                {!! Form::select('recordType',['A'=>'A', 'AAAA'=>'AAAA', 'ANY'=>'ANY','CAA'=>'CAA','CNAME'=>'CNAME', 'DS'=>'DS', 'LOC'=>'LOC','MX'=>'MX','NS'=>'NS','PTR'=>'PTR','SOA'=>'SOA','SPF'=>'SPF','SRV'=>'SRV','TXT'=>'TXT'],'ANY',['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <strong>Hostname or IP Address:</strong>
                                <br/>
                                {!! Form::text('hostname', ' ',['class' => 'form-control'])!!}
                            </div>
                        </div>
                        <div >
                            <button type="submit" class="btn btn-primary">DIG Lookup</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table style="boarder:none">
                            <thead>
                                <tr >
                                    <th style="text-align:center; font-size:20px;">Zone Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($dig as $item)
                            
                                <tr>
                                    <td > {!!$item!!}</td>
                                    
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                
                    </div> 
        
                </div>
                <!-- /.col-lg-6 -->
            </div>
        </div>
</div>
    




@endsection