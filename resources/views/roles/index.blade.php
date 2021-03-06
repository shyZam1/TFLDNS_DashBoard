@extends('theme.default')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline','onsubmit' => "return confirm('Are you sure you want to delete?')"]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {{-- <button class='btn btn-danger' type='submit' data-toggle="modal" data-target="#confirmDelete" data-title="Delete Role" data-message='Are you sure you want to delete this role ?'>
                            <i class='glyphicon glyphicon-trash'></i> Delete
                    </button> --}}
                    
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>

{{-- @include('delete_confirm'); --}}

{!! $roles->render() !!}


@endsection