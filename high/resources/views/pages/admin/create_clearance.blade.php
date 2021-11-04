@extends('layout.master')
@section('title')
    ACD Online Clearance System
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@stop

@section('content')
    <div class="alert alert-danger" id="alert" style="display:none;" role="alert">
                {{$errors->first()}}
        </div>
        <div class="alert alert-info" id="alert" style="" role="alert">
                <h3>ACTIVE::{{$schoolyear->schoolyear}}</h3>
        </div>
        <div class="col-4">
            <!-- form body -->
            <div class="row p-2 border-primary bg-white" style="border-top: 5px solid">
                <div class="col mx-auto">
                    <div class="">
                        <form class="user" action="{{route('admin.storeclearance')}}" method="post">
                                        @csrf 
                                        <div class="form-group">
                                        <select class="form-select mb-1 shadow gradelevel" onchange="showsem()" name="gradelevel" required>
                                            <option value="" selected>Select Gradelevel</option>
                                            <option value='jhs'>JHS</option >
                                            <option value='shs'>SHS</option >
                                        </select>
                                        <select class="form-select mb-1 shadow sem" style='display:none;' name="sem">
                                            <option value="" selected>Select Semester</option>
                                            <option value='1st'>1st</option>
                                            <option value='2nd'>2nd</option>
                                        </select> 
                                        <select id="choices-multiple-remove-button" name="signatory[]" placeholder="Select Assignatory" multiple required>
                                        </select>
                                        
                                        </div>
                                            <button class="form-control btn-outline-primary" type="submit">Create Clearance</button>
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
                            <th>level</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>

            <!-- Modal Assignatory-->
    <div class="modal fade p-3" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Assignatories</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="" style="">
                    <table class="table table-bordered m-2 assignatory">
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </div>
    </div>
    </div>
   

@stop

@section('script')
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('admin.getclearance')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'level', name: 'level'},
            {data: 'status', name: 'status'},
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
    $.ajax({    
        type: 'get',
        url: "{{route('admin.assignatory')}}",
        })
        .done(function(signatory){  
        for(i=0;i<signatory.length;i++){
            $('#choices-multiple-remove-button').append(
                "<option value="+signatory[i].id+">"+signatory[i].name+"</option>"
            );
        }
        ajax.url( "{{route('admin.assignatory')}}" ).load();
    });
   
    $(document).ready(function(){
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
    removeItemButton: true,
    });
    });

    function showsem() {
        var grade = $.trim($('select[name="gradelevel"]').val());
        if(grade=="shs"){
            $('.sem').fadeIn();
        }else{
            $('.sem').fadeOut();
            $('.sem').value(null);
        }
    };

    function showassignatory(id) {
        var table = $('.assignatory').DataTable({
        retrieve: true,
        processing: true,
        serverSide: true,
        searching:false,
        paging: false,
        info: false,
        ajax: "showassignatory/"+id,
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
        table.ajax.url( "showassignatory/"+id ).load();
    };



    $('document').ready(function(){
        @if($errors->any())
            $("#alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
    })
    
  </script>

@stop
