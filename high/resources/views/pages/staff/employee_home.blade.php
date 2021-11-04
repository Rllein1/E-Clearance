@extends('layout.master')
@section('title')
    ACD Online Clearance System
@stop

@section('css')

@stop

@section('content')
    <div class="mt-4 p-2 border-success bg-white" style="border-top: 5px solid">
    <h1>Clearance</h1>
            <div class="" style="">
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

        </div>


    <!-- Modal -->
    <div class="modal fade p-3" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">REMARK:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="" style="">
            <form id="adduser" action="{{route('staff.select')}}" method="get">
                @csrf
                    <table class="table table-bordered m-2 student">
                        <thead>
                            <tr>
                            <th><input type="checkbox" class="selectall" id=""></th>
                            <th>No</th>
                            <th>Name</th>
                            <th>status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <button class="btn btn-outline-primary" type="submit" style="float:right">select</button>
            </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </div>
    </div>
    </div>

    <!--- VIEW MODAL---->    
    <div class="modal clearance" id="employeeModal" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title username" id="exampleModalLabel">Clearance</h5>
            <button type="button" class="btn-close" onclick="hide()"></button>
        </div>
        <div class="modal-body">
                <form class="updateform"  method="POST">
                    @csrf                        
                    <div class="form-group">
                        <h4>Remarks:</h4>
                        <h5 class="remark"></h5>
                        <a class="btn btn-outline-success m-1 change" style="float:right" onclick="edit()"> <i class="fas fa-solid fa-pen-square"></i></a>
                        <button class="btn btn-outline-success m-1 save" style="float:right;display:" > <i class="fas fa-share-square"></i></button>
                        <div class="remarks">

                        </div>
                    </div>
                </form>
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
        ajax: "{{route('staff.getclearance')}}",
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
    function showclearance(id) {
        $(".clearance").fadeIn();
        $.ajax({    
                type:"GET",
                url: "remark/"+id,             
                dataType: "json",                  
                success: function(response){
                    $(".remark").html(response.remark); 
                    $(".updateform").attr('action',"http://127.0.0.1:8000/staff/addremark/"+response.id) 
                }
                    
            });
    };

    function showstudent(id) {
        var table = $('.student').DataTable({
        retrieve: true,
        processing: true,
        serverSide: true,
        ajax: "student/"+id,
        columns: [
            {data: 'select', name: 'select',orderable: false,searchable: false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
        });
        table.ajax.url( "student/"+id ).load();
    };
    $(document).on('click','.selectall',function(){
        if(this.checked){
            $(".checkbox").each(function(){
                this.checked=true;
            });
        }else{
            $('.checkbox').each(function(){
                this.checked=false;
            });
        }
    })

    function edit(){
        $(".remarks").append(' <input type="text" class="form-control mb-1 shadow" name="addremark[]" placeholder="Enter last name" required>');

    }
    function hide(){
        $(".clearance").fadeOut();
        $(".remarks").html("");

    }
</script>

@stop
