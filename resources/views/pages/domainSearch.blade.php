@extends('theme.default')

@section('content')
    <div class="container">
            <h1 style="text-align:center;">TFL Domain Inventory</h1>
    </br>
            <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div  class="panel-heading">Search Domain Register (.school.fj)</div>
                                <div class="panel-body">
                                    <form action="/search" method="POST" role="search">
                                    </br>
                                    </br>
                                        {{ csrf_field() }}
                                        <div style="width:100%;margin-left:auto;margin-right:auto;"class="input-group">
                                            <input style="width:60%;" type="text" class="form-control" name="q"
                                                placeholder="Search for domains">
                                                 <select style="width:40%;" class="form-control" name="x"> 
                                                        <option value=".school.fj">.school.fj</option>
                                                        <option value=".telecom.lan">.telecom.lan</option>
                                                        <option value=".gov.fj">.gov.fj</option>
                                                        <option value=".com.fj">.com.fj</option>
                                                 </select> 
                                                 <span class="input-group-btn">
                                                     <button type="submit" class="btn btn-default">
                                                <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </br>
                                    
                                    @if(isset($details))
                                        <h2 style="text-align:center;"> Domain already exists.</h2>
                                        <h3 style="text-align:center;">Inventory Record:</h3>
                                        <table class="table table-hover table-bordered" style="width:70%;margin-right:auto;margin-left:auto;text-align:center; background-color:white; border-collapse:collapse;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th style="text-align:center;">Domain Record</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($details as $domain)
                                                <tr>
                                                    {{-- <td>{{$domain->id}}</td> --}}
                                                    <td>{{$domain->domain_name}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($message))
                                    </br>
                                        <h2 style="text-align:center">{{ $message }}</h2>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
        
       
    </div>
@endsection


