@extends('layout.master')
@section('title')
    ACD Online Clearance System
@stop

@section('css')

@stop

@section('content')
        <div class="col-4">
            <!-- form body -->
            <div class="row p-2 border-primary bg-white" style="border-top: 5px solid">
                <div class="col mx-auto">
                    <div class="">
                        <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="inputGroupSelect04">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Add Signatory
                                        </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-8 ">
            <div class="p-2 border-success bg-white" style="border-top: 5px solid">
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
   

@stop

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
@stop
