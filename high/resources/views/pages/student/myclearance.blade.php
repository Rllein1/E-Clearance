@extends('layout.master')
@section('title')
    ACD Online Clearance System
@stop

@section('css')

@stop

@section('content')
    <div class="mt-4 p-2 border-success bg-white" style="border-top: 5px solid">
    <h1>MY CLEARANCE</h1>
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


    <!-- View Clearance -->
    <div class="modal viewclearance" id="employeeModal" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title username" id="exampleModalLabel">Clearance</h5>
            <button type="button" class="btn-close" onclick="$(this).click($('.viewclearance').fadeOut())"></button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered clearancetable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Remark</th>
                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
             </table>
        </div>
        </div>
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
        ajax: "{{route('student.getmyclearance')}}",
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
<script>
    function clearanceinfo(id) {
        $(".viewclearance").fadeIn();
        var table = $('.clearancetable').DataTable({
        processing: true,
        serverSide: true,
        searching:false,
        paging: false,
        info: false,
        retrieve: true,
        ajax: "{{route('student.requirement')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {
                data: 'name', 
                name: 'name', 
                orderable: true, 
                searchable: true
            },
            {data: 'status', name: 'status'},
            {data: 'remark', name: 'remark'},
   
        ]
        });
    };
</script>

@stop
