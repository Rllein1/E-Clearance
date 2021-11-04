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
                        <form class="user" action="{{route('admin.storeclass')}}" method="post">
                                        @csrf 
                                        <div class="form-group">
                                            <div>
                                                <select class="form-select m-1 shadow grade" name="grade" required>
                                                    <option value='' selected>Choose grade</option>
                                                    <option value='7'>7</option>
                                                    <option value='8'>8</option>
                                                    <option value='9'>9</option>
                                                    <option value='10'>10</option>
                                                    <option value='11'>11</option>
                                                    <option value='12'>12</option>
                                                </select>
                                            </div>
                                            <div>
                                                <input type="text" class="form-group form-control m-1" name="section" placeholder="Enter Section" required>
                                            </div>
                                            <div>
                                                <select class="form-select m-1 shadow adviser" name="adviser">
                                                    <option value='' selected>Choose adviser</option>
                                                </select> 
                                            </div>        
                                        </div>
                                            <button class="form-control btn-outline-primary" type="submit">Add Class</button>
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
                            <th>Gradelevel</th>
                            <th>Section</th>
                            <th>Adviser</th>
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
        ajax: "{{route('admin.getclass')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'gradelevel', name: 'gradelevel'},
            {data: 'name', name: 'name'},
            {data: 'adviser', name: 'adviser'},
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
    $(function(){
            $.ajax({    
                type: 'get',
                url: "{{route('admin.teacher')}}",                 
            })
            .done(function(teachers){  
                for(i=0;i<teachers.length;i++){
                    $(".adviser").append(
                        "<option value="+teachers[i].id+">"+teachers[i].fname+' '+teachers[i].lname+"</option>"
                    );
                }
            });
    });


    $('document').ready(function(){
        @if($errors->any())
            $("#alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
    })
    
  </script>
@stop
