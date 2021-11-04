@extends('layout.master')
@section('title')
    ACD Online Clearance System
@stop

@section('css')

@stop

@section('content')
        <div class="alert alert-danger" id="alert" style="display:none;" role="alert">
                {{$errors->first()}}
        </div>
        <div class="col-4">
            <!-- form body -->
            <div class="row p-2 border-primary bg-white" style="border-top: 5px solid">
                <div class="col mx-auto">
                    <div class="">
                        <form class="user" action="{{route('admin.storeIC')}}" method="post">
                                        @csrf 
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control m-1" name="fname" placeholder="Enter first name">
                                            <input type="text" class="form-control form-control m-1" name="lname" placeholder="Enter last name">
                                        </div>
                                            <button class="form-control btn-outline-primary" type="submit">Add New In-Charge</button>
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
                            <th>Department</th>
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
        ajax: "{{route('admin.getincharge')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'dept', name: 'dept'},
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
<script>
    $('document').ready(function(){
        @if($errors->any())
            $("#alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
    })
    
  </script>
@stop
