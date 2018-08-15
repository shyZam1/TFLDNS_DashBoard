@extends('theme.default')



@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">My Users</h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->
<table class="table table-borderless" id="tbUser">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Password</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        @foreach($data as $item)
        <tr class="item{{$item->id}}">
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td><button class="edit-modal btn btn-info"
                    data-info="{{$item->id}},{{$item->name}},{{$item->email}},{{$item->role}},{{$item->password}}">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
                <button class="delete-modal btn btn-danger"
                data-info="{{$item->id}},{{$item->name}},{{$item->email}},{{$item->role}},{{$item->password}}">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            </td>
        </tr>
        @endforeach
</table>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <divclass="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="name">
                        </div>
                    </div>
                    <p class="name_error error text-center alert alert-danger hidden"></p>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <p class="email_error error text-center alert alert-danger hidden"></p>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="password">
                        </div>
                    </div>
                    <p
                        class="password_error error text-center alert alert-danger hidden"></p>
                    
                </form>
                <div class="deleteContent">
                    Are you Sure you want to delete <span class="dname"></span> ? <span
                        class="hidden did"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class='glyphicon'> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    
<script>
    $(document).ready(function() {
        $('#tbUser').DataTable();
    } );
</script>

<!-- Edit model  document -->
<script>
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').removeClass('edit');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        var stuff = $(this).data('info').split(',');
        $('.did').text(stuff[0]);
        $('.dname').html(stuff[1] +" "+stuff[2]);
        $('#myModal').modal('show');
    });

function fillmodalData(details){
    $('#fid').val(details[0]);
    $('#name').val(details[1]);
    $('#email').val(details[2]);
    $('#password').val(details[3]);
}

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#fame').val(),
                'email': $('#email').val(),
                'password': $('#password').val(),
            },
            success: function(data) {
            	if (data.errors){
                	$('#myModal').modal('show');
                    if(data.errors.name) {
                    	$('.name_error').removeClass('hidden');
                        $('.name_error').text("Name can't be empty !");
                    }
                    if(data.errors.email) {
                    	$('.email_error').removeClass('hidden');
                        $('.email_error').text("Email must be a valid one !");
                    }
                    if(data.errors.password) {
                    	$('.password_error').removeClass('hidden');
                        $('.password_error').text("Password must be a valid one !");
                    }
                }
            	 else {

                     $('.error').addClass('hidden');
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" +
                        data.id + "</td><td>" + data.name +
                        "</td><td>" + data.email + "</td><td>" + data.password + "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id+","+data.name+","+data.email+","+data.password+"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + data.id+","+data.name+","+data.email+","+data.password+"' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

            	 }}
        });
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
</script>





<!-- JQuery Datatable -->



@endsection