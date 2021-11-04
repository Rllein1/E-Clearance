@extends('layout.master')
@section('title')
    ACD Online Clearance System
@stop

@section('css')

@stop

@section('content')

    
    <div class="mt-4 p-2 border-success bg-white" style="border-top: 5px solid">
    <h1>My Class</h1>
    <h3>Section:{{$class = Auth::user()->account->adviser->advisory->name}}</h3>
    <h3>Grade:{{$class = Auth::user()->account->adviser->advisory->gradelevel}}</h3>
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
        searching:false,
        paging: false,
        info: false,
        ajax: "{{route('staff.getmystudent')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
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
